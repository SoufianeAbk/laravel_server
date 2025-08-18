@extends('layouts.app')

@section('title', 'Verify Email - Football Jersey Shop')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card text-center">
                    <!-- Icon -->
                    <div class="verify-icon mb-4">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>

                    <!-- Header -->
                    <h2 class="mb-3">Verify Your Email Address</h2>
                    
                    <!-- Success Message -->
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif

                    <!-- Main Content -->
                    <p class="text-muted mb-4">
                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email, you can request another one.
                    </p>

                    <!-- User Email Display -->
                    <div class="email-display mb-4">
                        <i class="fas fa-user-circle me-2"></i>
                        <strong>{{ Auth::user()->email }}</strong>
                    </div>

                    <!-- Resend Verification Form -->
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg mb-3">
                            <i class="fas fa-paper-plane me-2"></i> Resend Verification Email
                        </button>
                    </form>

                    <!-- Additional Actions -->
                    <div class="mt-4 pt-4 border-top">
                        <p class="text-muted small mb-3">Having trouble?</p>
                        
                        <div class="d-flex justify-content-center gap-3">
                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link text-muted text-decoration-none">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </button>
                            </form>

                            <!-- Contact Support -->
                            <a href="{{ route('contact') }}" class="btn btn-link text-muted text-decoration-none">
                                <i class="fas fa-headset me-1"></i> Contact Support
                            </a>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="instructions-box mt-4">
                        <h6 class="mb-3">Didn't receive the email?</h6>
                        <ul class="text-start text-muted small">
                            <li>Check your spam or junk folder</li>
                            <li>Make sure {{ Auth::user()->email }} is correct</li>
                            <li>Wait a few minutes and try again</li>
                            <li>Contact support if the problem persists</li>
                        </ul>
                    </div>
                </div>

                <!-- Back to Shop -->
                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="text-muted text-decoration-none">
                        <i class="fas fa-arrow-left me-1"></i> Continue Shopping
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

    .verify-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s infinite;
    }

    .verify-icon i {
        font-size: 3rem;
        color: white;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(118, 75, 162, 0.4);
        }
        70% {
            box-shadow: 0 0 0 20px rgba(118, 75, 162, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(118, 75, 162, 0);
        }
    }

    .email-display {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        font-size: 1.1rem;
    }

    .instructions-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid var(--bs-danger);
    }

    .instructions-box ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .instructions-box li {
        margin-bottom: 5px;
    }

    .btn-link {
        font-size: 0.9rem;
    }

    .btn-link:hover {
        text-decoration: underline !important;
    }

    /* Loading animation for resend button */
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
        
        .verify-icon {
            width: 80px;
            height: 80px;
        }
        
        .verify-icon i {
            font-size: 2.5rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Add loading state to resend button
        $('form button[type="submit"]').click(function() {
            const btn = $(this);
            
            // Prevent multiple clicks
            if (btn.hasClass('btn-loading')) {
                return false;
            }
            
            // Add loading state
            setTimeout(function() {
                btn.addClass('btn-loading');
            }, 10);
        });

        // Auto-check email verification status (optional)
        // You could implement a periodic check to see if email is verified
        setInterval(function() {
            $.ajax({
                url: '{{ route("verification.check") }}', // You'd need to create this route
                method: 'GET',
                success: function(response) {
                    if (response.verified) {
                        window.location.href = '{{ route("home") }}';
                    }
                },
                error: function() {
                    // Silent fail - don't interrupt user
                }
            });
        }, 10000); // Check every 10 seconds
    });
</script>
@endpush