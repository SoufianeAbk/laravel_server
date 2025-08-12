<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmailVerificationPromptController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // If already verified, redirect to home (or wherever you want)
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        // Otherwise, show the verification notice view
        return view('auth.verify-email');
    }
}
