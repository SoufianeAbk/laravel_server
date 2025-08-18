@extends('layouts.app')

@section('title', 'Forgot Password - Football Jersey Shop')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <!-- Icon -->
                    <div class="text-center mb-4">
                        <div class="forgot-icon mb-3">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h2 class="mb-3">Forgot Password?</h2>
                        <p class="text-muted">
                            No worries! Enter your email address and we'll send you a link to reset your password.
                        </p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Password Reset Form -->
                    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email" 
                                       type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autofocus 
                                       autocomplete="username"
                                       placeholder="Enter your registered email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-paper-plane me-2"></i> Send Reset Link
                            </button>
                        </div>

                        <!-- Back to Login -->
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-muted text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i> Back to Login
                            </a>
                        </div>
                    </form>

                    <!-- Help Section -->
                    <div class="help-section mt-4 pt-4 border-top">
                        <h6 class="mb-3">Need Help?</h6>
                        <ul class="text-muted small">
                            <li>Make sure you enter the email address associated with your account</li>
                            <li>Check your spam folder if you don't receive the email</li>
                            <li>Contact our <a href="{{ route('contact') }}" class="text-danger">support team</a> if you continue to have issues</li>
                        </ul>
                    </div>
                </div>

                <!-- Additional Links -->
                <div class="text-center mt-4">
                    <p class="text-muted">
                        Remember your password? 
                        <a href="{{ route('login') }}" class="text-danger text-decoration-none fw-bold">Login</a>
                    </p>
                    <p class="text-muted">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-danger text-decoration-none fw-bold">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .auth-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        padding: 40px 0;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    }

    .auth-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        animation: slideUp 0.5s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .forgot-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: float 3s ease-in-out infinite;
    }

    .forgot-icon i {
        font-size: 2.5rem;
        color: white;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .auth-form .form-control {
        padding: 12px 15px;
        font-size: 1rem;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
    }

    .auth-form .form-control:focus {
        border-color: var(--bs-danger);
        box-shadow: 0 0 0 0.2rem rgba(233, 69, 96, 0.1);
    }

    .auth-form .input-group-text {
        background: transparent;
        border: 1px solid #e0e0e0;
        border-right: none;
        color: #666;
    }

    .auth-form .input-group .form-control {
        border-left: none;
    }

    .help-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .help-section ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .help-section li {
        margin-bottom: 8px;
    }

    /* Success message animation */
    .alert-success {
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Loading state for button */
    .btn-loading {
        position: relative;
        color: transparent !important;
        pointer-events: none;
    }

    .btn-loading::after {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spinner 0.6s linear infinite;
    }

    @keyframes spinner {
        to {
            transform: rotate(360deg);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .auth-card {
            padding: 30px 20px;
        }
        
        .forgot-icon {
            width: 60px;
            height: 60px;
        }
        
        .forgot-icon i {
            font-size: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Form validation and loading state
        $('.auth-form').submit(function(e) {
            const email = $('#email').val();
            const submitBtn = $(this).find('button[type="submit"]');
            
            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                $('#email').addClass('is-invalid');
                if (!$('#email').next('.invalid-feedback').length) {
                    $('#email').after('<span class="invalid-feedback d-block">Please enter a valid email address</span>');
                }
                return false;
            }
            
            // Add loading state to button
            submitBtn.addClass('btn-loading');
        });

        // Remove error classes on input
        $('#email').on('input', function() {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        });

        // Auto-focus on email input
        $('#email').focus();
    });
</script>
@endpush