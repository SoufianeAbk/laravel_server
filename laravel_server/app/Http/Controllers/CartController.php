<?php

namespace App\Http\Controllers;

use App\Models\Jersey;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display cart
     */
    public function index()
    {
        $cartItems = $this->getCartItems();
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        $tax = $subtotal * 0.21; // 21% VAT
        $shipping = $subtotal > 50 ? 0 : 5.99;
        $total = $subtotal + $tax + $shipping;

        return view('cart.index', compact('cartItems', 'subtotal', 'tax', 'shipping', 'total'));
    }

    /**
     * Add item to cart
     */
    public function add(Request $request)
    {
        $request->validate([
            'jersey_id' => 'required|exists:jerseys,id',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1'
        ]);

        $jersey = Jersey::findOrFail($request->jersey_id);

        // Check stock
        if ($jersey->stock_quantity < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock available'
            ], 400);
        }

        // Check if item already exists in cart
        $existingCartItem = Cart::where('user_id', Auth::id())
            ->where('session_id', Auth::check() ? null : Session::getId())
            ->where('jersey_id', $jersey->id)
            ->where('size', $request->size)
            ->first();

        if ($existingCartItem) {
            // Update quantity if item exists
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + $request->quantity,
                'price' => $jersey->price
            ]);
        } else {
            // Create new cart item
            Cart::create([
                'user_id' => Auth::id(),
                'session_id' => Auth::check() ? null : Session::getId(),
                'jersey_id' => $jersey->id,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'price' => $jersey->price
            ]);
        }

        $cartCount = $this->getCartCount();

        return response()->json([
            'success' => true,
            'message' => 'Jersey added to cart',
            'cartCount' => $cartCount
        ]);
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = $this->getCartItems()->find($id);
        
        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found'
            ], 404);
        }

        // Check stock
        if ($cartItem->jersey->stock_quantity < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock available'
            ], 400);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json([
            'success' => true,
            'message' => 'Cart updated',
            'item_total' => number_format($cartItem->price * $cartItem->quantity, 2)
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove($id)
    {
        $cartItem = $this->getCartItems()->find($id);
        
        if ($cartItem) {
            $cartItem->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart'
        ]);
    }

    /**
     * Clear entire cart
     */
    public function clear()
    {
        $this->getCartItems()->each->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared');
    }

    /**
     * Get cart items count for header
     */
    public function count()
    {
        return response()->json([
            'count' => $this->getCartCount()
        ]);
    }

    /**
     * Helper: Get cart items
     */
    private function getCartItems()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())->with('jersey')->get();
        }
        
        return Cart::where('session_id', Session::getId())->with('jersey')->get();
    }

    /**
     * Helper: Get cart count
     */
    private function getCartCount()
    {
        return $this->getCartItems()->sum('quantity');
    }

    /**
     * Migrate session cart to user cart after login
     */
    public function migrateSessionCart()
    {
        if (Auth::check()) {
            Cart::where('session_id', Session::getId())
                ->update([
                    'user_id' => Auth::id(),
                    'session_id' => null
                ]);
        }
    }
}