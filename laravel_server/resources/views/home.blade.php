@extends('layouts.app')

@section('title', 'Home - Premium Football Jerseys')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content text-center text-white py-5">
            <h1 class="display-3 fw-bold mb-4 fade-in-up">Authentic Football Jerseys</h1>
            <p class="lead mb-4 fade-in-up">Discover the latest collection from all major leagues</p>
            <div class="fade-in-up">
                <a href="{{ route('jerseys.index') }}" class="btn btn-danger btn-lg me-3">Shop Now</a>
                <a href="{{ route('jerseys.featured') }}" class="btn btn-outline-light btn-lg">Featured Items</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5">Shop by League</h2>
        <div class="row g-4">
            <div class="col-md-4 col-lg-2">
                <div class="category-card text-center">
                    <a href="{{ route('jerseys.index', ['league' => 'Premier League']) }}">
                        <div class="category-icon mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f2/Premier_League_Logo.svg/200px-Premier_League_Logo.svg.png" alt="Premier League" class="img-fluid" style="height: 80px;">
                        </div>
                        <h5>Premier League</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="category-card text-center">
                    <a href="{{ route('jerseys.index', ['league' => 'La Liga']) }}">
                        <div class="category-icon mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/LaLiga.svg/200px-LaLiga.svg.png" alt="La Liga" class="img-fluid" style="height: 80px;">
                        </div>
                        <h5>La Liga</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="category-card text-center">
                    <a href="{{ route('jerseys.index', ['league' => 'Serie A']) }}">
                        <div class="category-icon mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Serie_A_logo_2022.svg/200px-Serie_A_logo_2022.svg.png" alt="Serie A" class="img-fluid" style="height: 80px;">
                        </div>
                        <h5>Serie A</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="category-card text-center">
                    <a href="{{ route('jerseys.index', ['league' => 'Bundesliga']) }}">
                        <div class="category-icon mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/df/Bundesliga_logo_%282017%29.svg/200px-Bundesliga_logo_%282017%29.svg.png" alt="Bundesliga" class="img-fluid" style="height: 80px;">
                        </div>
                        <h5>Bundesliga</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="category-card text-center">
                    <a href="{{ route('jerseys.index', ['league' => 'Ligue 1']) }}">
                        <div class="category-icon mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Ligue_1_Uber_Eats_logo.svg/200px-Ligue_1_Uber_Eats_logo.svg.png" alt="Ligue 1" class="img-fluid" style="height: 80px;">
                        </div>
                        <h5>Ligue 1</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="category-card text-center">
                    <a href="{{ route('jerseys.index', ['league' => 'Champions League']) }}">
                        <div class="category-icon mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/b/bf/UEFA_Champions_League_logo_2.svg/200px-UEFA_Champions_League_logo_2.svg.png" alt="Champions League" class="img-fluid" style="height: 80px;">
                        </div>
                        <h5>Champions League</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center text-white mb-5">Featured Jerseys</h2>
        <div class="row g-4" id="featured-jerseys">
            <!-- Products will be loaded here via JavaScript -->
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('jerseys.featured') }}" class="btn btn-light btn-lg">View All Featured</a>
        </div>
    </div>
</section>

<!-- Popular Teams -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5">Popular Teams</h2>
        <div class="row g-3">
            @php
                $teams = [
                    'Real Madrid', 'Barcelona', 'Manchester United', 'Liverpool', 
                    'Bayern Munich', 'PSG', 'Juventus', 'Chelsea', 
                    'Manchester City', 'Arsenal', 'AC Milan', 'Inter Milan'
                ];
            @endphp
            @foreach($teams as $team)
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="{{ route('jerseys.index', ['team' => $team]) }}" class="btn btn-outline-primary w-100">
                        {{ $team }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-shipping-fast fa-3x mb-3 text-danger"></i>
                    <h4>Fast Shipping</h4>
                    <p>Free delivery on orders over €50</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-shield-alt fa-3x mb-3 text-danger"></i>
                    <h4>100% Authentic</h4>
                    <p>Guaranteed original products</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-undo fa-3x mb-3 text-danger"></i>
                    <h4>Easy Returns</h4>
                    <p>30-day return policy</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-headset fa-3x mb-3 text-danger"></i>
                    <h4>24/7 Support</h4>
                    <p>Dedicated customer service</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-gradient">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center text-white">
                <h3 class="mb-4">Stay Updated</h3>
                <p class="mb-4">Get the latest arrivals and exclusive offers directly to your inbox</p>
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email">
                        <button class="btn btn-danger btn-lg" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, rgba(26,26,46,0.9), rgba(233,69,96,0.9)), 
                    url('https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=1600') center/cover;
        padding: 100px 0;
    }
    
    .category-card {
        padding: 20px;
        border-radius: 10px;
        transition: all 0.3s;
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    
    .category-card a {
        text-decoration: none;
        color: var(--primary-color);
    }
    
    .product-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    
    .product-image {
        height: 300px;
        object-fit: cover;
        transition: transform 0.3s;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .product-info {
        padding: 15px;
    }
    
    .product-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 5px;
    }
    
    .product-team {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    
    .product-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--accent-color);
    }
    
    .feature-box {
        padding: 20px;
        transition: transform 0.3s;
    }
    
    .feature-box:hover {
        transform: translateY(-5px);
    }
    
    .bg-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
</style>
@endpush

@push('scripts')
<script>
    // Load featured jerseys
    document.addEventListener('DOMContentLoaded', function() {
        // Sample featured jerseys data (in real app, this would come from backend)
        const featuredJerseys = [
            {
                id: 1,
                name: 'Real Madrid Home 24/25',
                team: 'Real Madrid',
                price: '89.99',
                image: 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400'
            },
            {
                id: 2,
                name: 'Barcelona Away 24/25',
                team: 'Barcelona',
                price: '94.99',
                image: 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400'
            },
            {
                id: 3,
                name: 'Manchester United Home 24/25',
                team: 'Manchester United',
                price: '89.99',
                image: 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400'
            },
            {
                id: 4,
                name: 'Bayern Munich Home 24/25',
                team: 'Bayern Munich',
                price: '92.99',
                image: 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400'
            }
        ];
        
        const container = document.getElementById('featured-jerseys');
        
        featuredJerseys.forEach(jersey => {
            const card = `
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <a href="/jerseys/${jersey.id}">
                            <img src="${jersey.image}" alt="${jersey.name}" class="product-image w-100">
                        </a>
                        <div class="product-info">
                            <h5 class="product-title">${jersey.name}</h5>
                            <p class="product-team">${jersey.team}</p>
                            <p class="product-price">€${jersey.price}</p>
                            <button class="btn btn-danger btn-sm w-100" onclick="addToCart(${jersey.id})">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += card;
        });
    });
    
    // Add to cart function
    function addToCart(jerseyId) {
        // This would make an AJAX call to add item to cart
        alert('Item added to cart!');
        updateCartCount();
    }
</script>
@endpush