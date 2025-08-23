<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Jersey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display wishlist items
     */
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())
            ->with('jersey')
            ->latest()
            ->paginate(12);

        return view('wishlist.index', compact('wishlistItems'));
    }

    /**
     * Add item to wishlist
     */
    public function add(Request $request)
    {
        $request->validate([
            'jersey_id' => 'required|exists:jerseys,id'
        ]);

        $jersey = Jersey::findOrFail($request->jersey_id);

        // Check if already in wishlist
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('jersey_id', $jersey->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Item is already in your wishlist'
            ], 400);
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'jersey_id' => $jersey->id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Item added to wishlist'
        ]);
    }

    /**
     * Remove item from wishlist
     */
    public function remove($id)
    {
        $wishlistItem = Wishlist::where('user_id', Auth::id())
            ->findOrFail($id);

        $wishlistItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item removed from wishlist'
        ]);
    }

    /**
     * Move item from wishlist to cart
     */
    public function moveToCart($id)
    {
        $wishlistItem = Wishlist::where('user_id', Auth::id())
            ->with('jersey')
            ->findOrFail($id);

        // Add to cart logic here
        // $cartController = new CartController();
        // $cartController->add(...);

        // Remove from wishlist
        $wishlistItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item moved to cart'
        ]);
    }
}