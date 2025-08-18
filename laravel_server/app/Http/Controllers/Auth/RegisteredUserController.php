<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('Auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false, // New users are always regular users by default
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Send verification email
        $user->sendEmailVerificationNotification();

        return redirect(route('home'))
            ->with('success', 'Welcome to JerseyShop! Please check your email to verify your account.');
    }

    /**
     * Display the admin registration view (optional - only for super admin)
     */
    public function createAdmin(): View
    {
        // Check if current user is super admin
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        return view('Auth.admin-register');
    }

    /**
     * Handle admin registration (optional - only for super admin)
     */
    public function storeAdmin(Request $request): RedirectResponse
    {
        // Check if current user is super admin
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true, // Create as admin
            'email_verified_at' => now(), // Auto-verify admin accounts
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin user created successfully.');
    }
}