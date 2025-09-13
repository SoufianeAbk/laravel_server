<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate session for security
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Check if user is admin and redirect accordingly
        if ($this->isAdmin($user)) {
            // Admin redirect
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Welcome back, Admin ' . $user->name . '!');
        }

        // Regular user redirect
        return redirect()->intended(RouteServiceProvider::HOME ?? '/')
            ->with('success', 'Welcome back, ' . $user->name . '!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout the user
        Auth::guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'You have been logged out successfully.');
    }

    /**
     * Check if the user is an admin
     * 
     * @param \App\Models\User $user
     * @return bool
     */
    protected function isAdmin($user): bool
    {
        // Method 1: Check if user has is_admin column
        if (isset($user->is_admin)) {
            return $user->is_admin == 1;
        }

        // Method 2: Check if user has admin role (if using roles)
        if (method_exists($user, 'hasRole')) {
            return $user->hasRole('admin');
        }

        // Method 3: Check by email (simple approach for development)
        $adminEmails = [
            'admin@example.com',
            'admin@jerseyshop.com',
            // Add more admin emails here
        ];
        
        return in_array($user->email, $adminEmails);
    }

    /**
     * Handle admin login attempt with special route
     * Optional: Create a separate admin login form
     */
    public function createAdmin(): View
    {
        return view('auth.admin-login');
    }

    /**
     * Handle admin authentication
     * Optional: Separate admin login processing
     */
    public function storeAdmin(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate session
        $request->session()->regenerate();

        $user = Auth::user();

        // Verify this is actually an admin
        if (!$this->isAdmin($user)) {
            Auth::logout();
            return back()->withErrors([
                'email' => 'You do not have admin access.',
            ]);
        }

        // Redirect to admin dashboard
        return redirect()->intended(route('admin.dashboard'))
            ->with('success', 'Welcome to Admin Panel, ' . $user->name . '!');
    }
}