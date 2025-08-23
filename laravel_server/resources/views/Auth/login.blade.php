@extends('layouts.app')

@section('title', 'Login - Football Jersey Shop')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <!-- Logo/Header -->
                    <div class="text-center mb-4">
                        <i class="fas fa-tshirt auth-logo"></i>
                        <h2 class="mt-3">Welcome Back!</h2>
                        <p class="text-muted">Login to your account to continue shopping</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="auth-form">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
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
                                       placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input id="password" 
                                       type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="Enter your password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="divider my-4">
                            <span>OR</span>
                        </div>

                        <!-- Social Login (Optional) -->
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-dark">
                                <i class="fab fa-google me-2"></i> Continue with Google
                            </button>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="fab fa-facebook-f me-2"></i> Continue with Facebook
                            </button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center mt-4">
                            <p class="mb-0">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-danger text-decoration-none fw-bold">
                                    Sign up now
                                </a>
                            </p>
                        </div>
                    </form>

                    <!-- Demo Credentials (for development) -->
                    @if(config('app.debug'))
                        <div class="alert alert-info mt-4">
                            <h6 class="alert-heading">Demo Credentials:</h6>
                            <small>
                                <strong>User:</strong> user@example.com / password<br>
                                <strong>Admin:</strong> admin@ehb.be / Password!321
                            </small>
                        </div>
                    @endif
                </div>

                <!-- Additional Links -->
                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="text-muted text-decoration-none">
                        <i class="fas fa-arrow-left me-1"></i> Back to Shop
                    </a>
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

    .auth-logo {
        font-size: 4rem;
        color: var(--bs-danger);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
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

    .auth-form .input-group .form-control:focus + .btn,
    .auth-form .input-group .form-control:focus ~ .btn {
        border-color: var(--bs-danger);
        color: var(--bs-danger);
    }

    .btn-outline-secondary {
        border-left: none;
        border-color: #e0e0e0;
    }

    .btn-outline-secondary:hover {
        background: transparent;
        color: var(--bs-danger);
        border-color: var(--bs-danger);
    }

    .divider {
        position: relative;
        text-align: center;
    }

    .divider:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e0e0e0;
    }

    .divider span {
        background: white;
        padding: 0 15px;
        position: relative;
        color: #999;
        font-size: 0.9rem;
    }

    .btn-outline-dark:hover,
    .btn-outline-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .form-check-input:checked {
        background-color: var(--bs-danger);
        border-color: var(--bs-danger);
    }

    .form-check-input:focus {
        border-color: var(--bs-danger);
        box-shadow: 0 0 0 0.25rem rgba(233, 69, 96, 0.25);
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .auth-card {
            padding: 30px 20px;
        }
        
        .auth-logo {
            font-size: 3rem;
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

    /* Error shake animation */
    .shake {
        animation: shake 0.5s;
    }

    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: translateX(-5px);
        }
        20%, 40%, 60%, 80% {
            transform: translateX(5px);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Toggle password visibility
        $('#togglePassword').click(function() {
            const passwordField = $('#password');
            const icon = $(this).find('i');
            
            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Form validation and loading state
        $('.auth-form').submit(function(e) {
            const email = $('#email').val();
            const password = $('#password').val();
            const submitBtn = $(this).find('button[type="submit"]');
            
            // Basic validation
            if (!email || !password) {
                e.preventDefault();
                $(this).addClass('shake');
                setTimeout(() => {
                    $(this).removeClass('shake');
                }, 500);
                return false;
            }
            
            // Add loading state to button
            submitBtn.addClass('btn-loading');
        });

        // Auto-focus on first input
        $('#email').focus();

        // Remove error classes on input
        $('.form-control').on('input', function() {
            $(this).removeClass('is-invalid');
        });

        // Social login handlers (for future implementation)
        $('button:contains("Google")').click(function() {
            // Implement Google OAuth
            console.log('Google login not yet implemented');
        });

        $('button:contains("Facebook")').click(function() {
            // Implement Facebook OAuth
            console.log('Facebook login not yet implemented');
        });
    });
</script>
@endpush