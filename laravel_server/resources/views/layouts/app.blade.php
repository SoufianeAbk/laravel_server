<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Jersey Shop - Premium Football Jerseys')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
    
    <style>
        :root {
            --primary-color: #1a1a2e;
            --secondary-color: #16213e;
            --accent-color: #e94560;
            --text-light: #f5f5f5;
            --bg-dark: #0f0f1e;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        /* Header Styles */
        .navbar-custom {
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-custom .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
        }
        
        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .navbar-custom .nav-link:hover {
            color: var(--accent-color);
            transform: translateY(-2px);
        }
        
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        /* Footer Styles */
        .footer-custom {
            background: var(--primary-color);
            color: var(--text-light);
            padding: 3rem 0 1rem;
            margin-top: 5rem;
        }
        
        .footer-custom h5 {
            color: var(--accent-color);
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .footer-custom a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-custom a:hover {
            color: var(--accent-color);
        }
        
        /* Content Wrapper */
        .main-content {
            min-height: calc(100vh - 200px);
            padding: 2rem 0;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-tshirt"></i> JerseyShop
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jerseys.index') }}">All Jerseys</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jerseys.featured') }}">Featured</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Leagues
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('jerseys.index', ['league' => 'Premier League']) }}">Premier League</a></li>
                            <li><a class="dropdown-item" href="{{ route('jerseys.index', ['league' => 'La Liga']) }}">La Liga</a></li>
                            <li><a class="dropdown-item" href="{{ route('jerseys.index', ['league' => 'Serie A']) }}">Serie A</a></li>
                            <li><a class="dropdown-item" href="{{ route('jerseys.index', ['league' => 'Bundesliga']) }}">Bundesliga</a></li>
                            <li><a class="dropdown-item" href="{{ route('jerseys.index', ['league' => 'Ligue 1']) }}">Ligue 1</a></li>
                        </ul>
                    </li>
                </ul>
                
                <!-- Search Form -->
                <form class="d-flex me-3" action="{{ route('jerseys.search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search jerseys..." name="q">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                
                <!-- User Menu -->
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wishlist.index') }}">
                                <i class="fas fa-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-badge" id="cart-count">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.index') }}">My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-badge" id="cart-count">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-outline-light ms-2" href="{{ route('register') }}">Sign Up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="main-content">
        @if(session('success'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>About JerseyShop</h5>
                    <p>Your premium destination for authentic football jerseys from all major leagues worldwide.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jerseys.index') }}">All Jerseys</a></li>
                        <li><a href="{{ route('jerseys.featured') }}">Featured</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Customer Service</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('shipping') }}">Shipping Info</a></li>
                        <li><a href="{{ route('returns') }}">Returns</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Newsletter</h5>
                    <p>Subscribe to get exclusive offers and new arrivals.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button class="btn btn-danger" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="text-center">
                <p>&copy; 2025 JerseyShop. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Update cart count
        function updateCartCount() {
            fetch('{{ route("cart.count") }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-count').textContent = data.count;
                });
        }
        
        // Load cart count on page load
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
    
    @stack('scripts')
</body>
</html>