<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.jersey');
        return view('orders.show', compact('order'));
    }

    public function cancel(Order $order)
    {
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status === 'pending') {
            $order->update(['status' => 'cancelled']);
            return redirect()->route('orders.show', $order)
                ->with('success', 'Order cancelled successfully.');
        }

        return redirect()->route('orders.show', $order)
            ->with('error', 'This order cannot be cancelled.');
    }

    public function invoice(Order $order)
    {
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.jersey');
        return view('orders.invoice', compact('order'));
    }
}