@extends('layouts.app')

@section('title', 'Home - Football Jersey Shop')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Premium Football Jerseys</h1>
                <p class="lead mb-4">Discover authentic jerseys from all major leagues worldwide. Quality guaranteed.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('jerseys.index') }}" class="btn btn-danger btn-lg">Shop Now</a>
                    <a href="{{ route('jerseys.featured') }}" class="btn btn-outline-danger btn-lg">Featured Jerseys</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1708577907839-1240466aee53?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Football Jersey" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Featured Jerseys -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Featured Jerseys</h2>
        
        <div class="row g-4">
            @forelse($featuredJerseys as $jersey)
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100">
                        <div class="product-image-wrapper">
                            <a href="{{ route('jerseys.show', $jersey->id) }}">
                                <img src="{{ $jersey->image_url }}" 
                                     alt="{{ $jersey->name }}" 
                                     class="product-image w-100">
                            </a>
                            @if($jersey->is_featured)
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">Featured</span>
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">
                                <a href="{{ route('jerseys.show', $jersey->id) }}">{{ $jersey->name }}</a>
                            </h5>
                            <p class="product-team">{{ $jersey->team }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">{{ $jersey->formatted_price }}</span>
                                <button class="btn btn-sm btn-danger add-to-cart" 
                                        data-id="{{ $jersey->id }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No featured jerseys available at the moment.</p>
                    <a href="{{ route('jerseys.index') }}" class="btn btn-primary">Browse All Jerseys</a>
                </div>
            @endforelse
        </div>
        
        @if($featuredJerseys->count() > 0)
            <div class="text-center mt-5">
                <a href="{{ route('jerseys.index') }}" class="btn btn-outline-primary btn-lg">View All Jerseys</a>
            </div>
        @endif
    </div>
</section>

if(isset($nationalTeamJerseys) && $nationalTeamJerseys->count() > 0)
<!-- National Teams Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">National Team Jerseys</h2>
        
        <div class="row g-4">
            @foreach($nationalTeamJerseys as $jersey)
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100">
                        <div class="product-image-wrapper">
                            <a href="{{ route('jerseys.show', $jersey->id) }}">
                                <img src="{{ $jersey->image_url ?: 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=800' }}" 
                                     alt="{{ $jersey->name }}" 
                                     class="product-image w-100">
                            </a>
                            @if($jersey->is_featured)
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">Featured</span>
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">
                                <a href="{{ route('jerseys.show', $jersey->id) }}">{{ $jersey->name }}</a>
                            </h5>
                            <p class="product-team">{{ $jersey->team }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">{{ $jersey->formatted_price }}</span>
                                <button class="btn btn-sm btn-danger add-to-cart" 
                                        data-id="{{ $jersey->id }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('jerseys.index', ['league' => 'International']) }}" class="btn btn-outline-primary btn-lg">
                View All National Team Jerseys
            </a>
        </div>
    </div>
</section>

<!-- Popular Teams -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Shop by Team</h2>
        <div class="row g-3">
            @if(isset($popularTeams))
                @foreach($popularTeams as $team)
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="{{ route('jerseys.index', ['team' => $team]) }}" 
                           class="team-card text-center text-decoration-none">
                            <div class="team-logo mb-2">
                                <i class="fas fa-tshirt fa-3x"></i>
                            </div>
                            <h6>{{ $team }}</h6>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Why Choose JerseyShop</h2>
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                <h5>100% Authentic</h5>
                <p>All jerseys are guaranteed authentic and officially licensed.</p>
            </div>
            <div class="col-md-3 text-center">
                <i class="fas fa-truck fa-3x text-primary mb-3"></i>
                <h5>Fast Shipping</h5>
                <p>Free shipping on orders over €50. Delivery in 3-5 business days.</p>
            </div>
            <div class="col-md-3 text-center">
                <i class="fas fa-undo fa-3x text-primary mb-3"></i>
                <h5>Easy Returns</h5>
                <p>30-day return policy for your peace of mind.</p>
            </div>
            <div class="col-md-3 text-center">
                <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                <h5>24/7 Support</h5>
                <p>Our customer service team is here to help you anytime.</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics (Optional) -->
@if(isset($stats))
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <h3 class="display-4">{{ $stats['total_jerseys'] ?? '0' }}</h3>
                <p>Jerseys Available</p>
            </div>
            <div class="col-md-3">
                <h3 class="display-4">{{ $stats['total_teams'] ?? '0' }}</h3>
                <p>Teams</p>
            </div>
            <div class="col-md-3">
                <h3 class="display-4">{{ $stats['total_leagues'] ?? '0' }}</h3>
                <p>Leagues</p>
            </div>
            <div class="col-md-3">
                <h3 class="display-4">{{ number_format($stats['happy_customers'] ?? 0) }}</h3>
                <p>Happy Customers</p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Newsletter -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="mb-4">Stay Updated</h3>
                <p class="mb-4">Subscribe to our newsletter for exclusive offers and new arrivals.</p>
                <form class="input-group">
                    <input type="email" class="form-control" placeholder="Enter your email">
                    <button class="btn btn-danger" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 0;
    }
    
    .min-vh-50 {
        min-height: 50vh;
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
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    
    .product-image-wrapper {
        height: 300px;
        overflow: hidden;
        position: relative;
    }
    
    .product-image {
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .product-info {
        padding: 15px;
    }
    
    .product-title a {
        color: #333;
        text-decoration: none;
        font-weight: 600;
    }
    
    .product-title a:hover {
        color: var(--bs-primary);
    }
    
    .product-team {
        color: #666;
        font-size: 0.9rem;
    }
    
    .product-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--bs-danger);
    }
    
    .team-card {
        display: block;
        padding: 20px;
        background: white;
        border-radius: 10px;
        transition: all 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .team-card h6 {
        color: #333;
        margin: 0;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Add to cart functionality
        $('.add-to-cart').click(function() {
            const jerseyId = $(this).data('id');
            // Implement add to cart logic
            console.log('Add to cart:', jerseyId);
        });
    });
</script>
@endpush