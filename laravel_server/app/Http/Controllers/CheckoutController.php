<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display checkout page
     */
    public function index()
    {
        $cartItems = $this->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty');
        }
        
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        
        $tax = $subtotal * 0.21; // 21% VAT
        $shipping = $subtotal > 50 ? 0 : 5.99;
        $total = $subtotal + $tax + $shipping;
        
        $user = Auth::user();
        
        return view('checkout.index', compact(
            'cartItems', 
            'subtotal', 
            'tax', 
            'shipping', 
            'total',
            'user'
        ));
    }
    
    /**
     * Process checkout
     */
    public function process(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string|max:255',
            'shipping_postal_code' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:255',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            'terms' => 'accepted',
        ]);
        
        $cartItems = $this->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty');
        }
        
        DB::beginTransaction();
        
        try {
            // Calculate totals
            $subtotal = $cartItems->sum(function($item) {
                return $item->price * $item->quantity;
            });
            $tax = $subtotal * 0.21;
            $shipping = $subtotal > 50 ? 0 : 5.99;
            $total = $subtotal + $tax + $shipping;
            
            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'total' => $total,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'shipping_address' => [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->shipping_address,
                    'city' => $request->shipping_city,
                    'postal_code' => $request->shipping_postal_code,
                    'country' => $request->shipping_country,
                ],
                'billing_address' => $request->billing_same ? null : [
                    'address' => $request->billing_address,
                    'city' => $request->billing_city,
                    'postal_code' => $request->billing_postal_code,
                    'country' => $request->billing_country,
                ],
                'notes' => $request->notes,
            ]);
            
            // Create order items and update stock
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'jersey_id' => $item->jersey_id,
                    'size' => $item->size,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total' => $item->price * $item->quantity,
                ]);
                
                // Decrease stock
                $item->jersey->decrementStock($item->quantity);
            }
            
            // Clear cart
            $cartItems->each->delete();
            
            // Process payment (simplified - in real app, integrate with payment gateway)
            if ($request->payment_method == 'credit_card') {
                // Process credit card payment
                $this->processCreditCardPayment($order, $request);
            } elseif ($request->payment_method == 'paypal') {
                // Redirect to PayPal
                $this->processPayPalPayment($order);
            } else {
                // Bank transfer - send instructions
                $this->processBankTransfer($order);
            }
            
            DB::commit();
            
            // Send order confirmation email (implement mailer)
            // Mail::to($order->shipping_address['email'])->send(new OrderConfirmation($order));
            
            return redirect()->route('checkout.success', $order)
                ->with('success', 'Order placed successfully!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred processing your order. Please try again.');
        }
    }
    
    /**
     * Show order success page
     */
    public function success(Order $order)
    {
        // Verify the order belongs to the current user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('checkout.success', compact('order'));
    }
    
    /**
     * Helper: Get cart items
     */
    private function getCartItems()
    {
        return Cart::where('user_id', Auth::id())->with('jersey')->get();
    }
    
    /**
     * Process credit card payment (simplified)
     */
    private function processCreditCardPayment($order, $request)
    {
        // In a real application, integrate with Stripe, PayPal, etc.
        // For now, just mark as paid
        $order->update([
            'payment_status' => 'paid',
            'status' => 'processing'
        ]);
    }
    
    /**
     * Process PayPal payment (simplified)
     */
    private function processPayPalPayment($order)
    {
        // In a real application, redirect to PayPal
        // For now, just mark as pending
        $order->update([
            'payment_status' => 'pending'
        ]);
    }
    
    /**
     * Process bank transfer (simplified)
     */
    private function processBankTransfer($order)
    {
        // Send bank transfer instructions
        $order->update([
            'payment_status' => 'pending'
        ]);
    }
}