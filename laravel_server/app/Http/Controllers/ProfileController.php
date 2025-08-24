<?php

// ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($request->only(['name', 'email']));

        return redirect()->route('profile.index')
            ->with('success', 'Profile updated successfully.');
    }

    public function addresses()
    {
        return view('profile.addresses');
    }

    public function addAddress(Request $request)
    {
        // Implementation for adding addresses
        return redirect()->route('profile.addresses')
            ->with('success', 'Address added successfully.');
    }

    public function deleteAddress($id)
    {
        // Implementation for deleting addresses
        return redirect()->route('profile.addresses')
            ->with('success', 'Address deleted successfully.');
    }
}