@extends('layouts.app')

@section('title', 'Register - Football Jersey Shop')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <!-- Logo/Header -->
                    <div class="text-center mb-4">
                        <i class="fas fa-tshirt auth-logo"></i>
                        <h2 class="mt-3">Create Account</h2>
                        <p class="text-muted">Join JerseyShop for exclusive deals!</p>
                    </div>

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register') }}" class="auth-form">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input id="name" 
                                       type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       autofocus 
                                       autocomplete="name"
                                       placeholder="Enter your full name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                                       autocomplete="new-password"
                                       placeholder="Create a strong password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="text-muted mt-1 d-block">
                                Password must be at least 8 characters long
                            </small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input id="password-confirm" 
                                       type="password" 
                                       class="form-control" 
                                       name="password_confirmation" 
                                       required 
                                       autocomplete="new-password"
                                       placeholder="Confirm your password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Password Strength Indicator -->
                        <div class="password-strength mb-3" style="display: none;">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                            </div>
                            <small class="strength-text text-muted mt-1"></small>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="form-check mb-4">
                            <input class="form-check-input @error('terms') is-invalid @enderror" 
                                   type="checkbox" 
                                   name="terms" 
                                   id="terms" 
                                   value="1"
                                   {{ old('terms') ? 'checked' : '' }}
                                   required>
                            <label class="form-check-label" for="terms">
                                I agree to the 
                                <a href="{{ route('terms') }}" target="_blank" class="text-danger">Terms & Conditions</a> 
                                and 
                                <a href="{{ route('privacy') }}" target="_blank" class="text-danger">Privacy Policy</a>
                            </label>
                            @error('terms')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Newsletter Subscription (Optional) -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="newsletter" 
                                   id="newsletter" 
                                   value="1"
                                   {{ old('newsletter') ? 'checked' : '' }}>
                            <label class="form-check-label" for="newsletter">
                                Send me exclusive offers and updates via email
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-user-plus me-2"></i> Create Account
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="divider my-4">
                            <span>OR</span>
                        </div>

                        <!-- Social Registration (Optional) -->
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-dark">
                                <i class="fab fa-google me-2"></i> Sign up with Google
                            </button>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-4">
                            <p class="mb-0">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="text-danger text-decoration-none fw-bold">
                                    Login here
                                </a>
                            </p>
                        </div>
                    </form>
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
        border-right: none;
    }

    .auth-form .input-group .btn-outline-secondary {
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

    /* Password strength indicator */
    .password-strength .progress-bar {
        transition: width 0.3s, background-color 0.3s;
    }

    .strength-weak {
        background-color: #dc3545;
    }

    .strength-fair {
        background-color: #ffc107;
    }

    .strength-good {
        background-color: #28a745;
    }

    .strength-strong {
        background-color: #007bff;
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
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Toggle password visibility
        $('#togglePassword').click(function() {
            togglePasswordField('#password', $(this));
        });

        $('#togglePasswordConfirm').click(function() {
            togglePasswordField('#password-confirm', $(this));
        });

        function togglePasswordField(fieldId, button) {
            const field = $(fieldId);
            const icon = button.find('i');
            
            if (field.attr('type') === 'password') {
                field.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                field.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        }

        // Password strength checker
        $('#password').on('input', function() {
            const password = $(this).val();
            const strengthBar = $('.password-strength');
            const progressBar = strengthBar.find('.progress-bar');
            const strengthText = strengthBar.find('.strength-text');
            
            if (password.length > 0) {
                strengthBar.show();
                
                let strength = 0;
                let text = '';
                let className = '';
                
                // Check password strength
                if (password.length >= 8) strength += 25;
                if (password.match(/[a-z]+/)) strength += 25;
                if (password.match(/[A-Z]+/)) strength += 25;
                if (password.match(/[0-9]+/)) strength += 25;
                if (password.match(/[$@#&!]+/)) strength += 25;
                
                // Cap at 100
                strength = Math.min(strength, 100);
                
                // Determine strength level
                if (strength < 40) {
                    text = 'Weak password';
                    className = 'strength-weak';
                } else if (strength < 60) {
                    text = 'Fair password';
                    className = 'strength-fair';
                } else if (strength < 80) {
                    text = 'Good password';
                    className = 'strength-good';
                } else {
                    text = 'Strong password';
                    className = 'strength-strong';
                }
                
                progressBar.css('width', strength + '%')
                          .removeClass('strength-weak strength-fair strength-good strength-strong')
                          .addClass(className);
                strengthText.text(text);
            } else {
                strengthBar.hide();
            }
        });

        // Password confirmation validation
        $('#password-confirm').on('input', function() {
            const password = $('#password').val();
            const confirmPassword = $(this).val();
            
            if (confirmPassword && password !== confirmPassword) {
                $(this).addClass('is-invalid');
                if (!$(this).next('.invalid-feedback').length) {
                    $(this).after('<span class="invalid-feedback d-block">Passwords do not match</span>');
                }
            } else {
                $(this).removeClass('is-invalid');
                $(this).next('.invalid-feedback').remove();
            }
        });

        // Form validation and loading state
        $('.auth-form').submit(function(e) {
            const submitBtn = $(this).find('button[type="submit"]');
            
            // Check if passwords match
            const password = $('#password').val();
            const confirmPassword = $('#password-confirm').val();
            
            if (password !== confirmPassword) {
                e.preventDefault();
                $('#password-confirm').addClass('is-invalid');
                return false;
            }
            
            // Check if terms are accepted
            if (!$('#terms').is(':checked')) {
                e.preventDefault();
                alert('Please accept the Terms & Conditions to continue.');
                return false;
            }
            
            // Add loading state to button
            submitBtn.addClass('btn-loading');
        });

        // Remove error classes on input
        $('.form-control').on('input', function() {
            $(this).removeClass('is-invalid');
        });

        // Social registration handlers (for future implementation)
        $('button:contains("Google")').click(function() {
            console.log('Google registration not yet implemented');
        });

        $('button:contains("Facebook")').click(function() {
            console.log('Facebook registration not yet implemented');
        });
    });
</script>
@endpush