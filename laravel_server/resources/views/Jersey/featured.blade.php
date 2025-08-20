@extends('layouts.app')

@section('title', 'Featured Jerseys 2024-25 - Football Jersey Shop')

@section('content')
<!-- Hero Section -->
<div class="hero-section bg-danger text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">2024-25 Season Jerseys</h1>
                <p class="lead mb-4">
                    Discover the latest authentic football jerseys from Europe's top leagues. 
                    From Premier League to La Liga, find your team's colors for the new season.
                </p>
                <a href="{{ route('jerseys.index') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-shopping-bag me-2"></i> Shop All Jerseys
                </a>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-trophy fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <!-- Featured Categories -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="mb-4">Featured Collections</h2>
            <p class="lead text-muted mb-5">Explore jerseys from Europe's top football leagues</p>
        </div>
    </div>

    <!-- League Sections -->
    
    <!-- Premier League -->
    <section class="league-section mb-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">
                            <i class="fas fa-crown me-2"></i> Premier League 2024-25
                        </h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('jerseys.index', ['league' => 'Premier League']) }}" class="btn btn-light btn-sm">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FF0000/FFFFFF?text=Man+United+Home" alt="Manchester United Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Manchester United Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/0066CC/FFFFFF?text=Man+City+Home" alt="Manchester City Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Manchester City Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FF1493/FFFFFF?text=Arsenal+Home" alt="Arsenal Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Arsenal Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/034694/FFFFFF?text=Chelsea+Home" alt="Chelsea Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Chelsea Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- La Liga -->
    <section class="league-section mb-5">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">
                            <i class="fas fa-star me-2"></i> La Liga 2024-25
                        </h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('jerseys.index', ['league' => 'La Liga']) }}" class="btn btn-dark btn-sm">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FFFFFF/FF0000?text=Real+Madrid+Home" alt="Real Madrid Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Real Madrid Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/004C99/FFD700?text=Barcelona+Home" alt="Barcelona Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>FC Barcelona Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FF0000/FFFFFF?text=Atletico+Home" alt="Atletico Madrid Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Atletico Madrid Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€84.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FFFFFF/000000?text=Sevilla+Home" alt="Sevilla Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Sevilla FC Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€79.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Serie A -->
    <section class="league-section mb-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">
                            <i class="fas fa-shield-alt me-2"></i> Serie A 2024-25
                        </h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('jerseys.index', ['league' => 'Serie A']) }}" class="btn btn-light btn-sm">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/000000/FFFFFF?text=Juventus+Home" alt="Juventus Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Juventus Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/8B0000/FFD700?text=AC+Milan+Home" alt="AC Milan Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>AC Milan Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€84.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/0066CC/000000?text=Inter+Milan+Home" alt="Inter Milan Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Inter Milan Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€84.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/87CEEB/000080?text=Napoli+Home" alt="Napoli Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>SSC Napoli Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€79.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bundesliga -->
    <section class="league-section mb-5">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">
                            <i class="fas fa-eagle me-2"></i> Bundesliga 2024-25
                        </h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('jerseys.index', ['league' => 'Bundesliga']) }}" class="btn btn-light btn-sm">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/DC143C/FFFFFF?text=Bayern+Munich+Home" alt="Bayern Munich Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Bayern Munich Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FFD700/000000?text=Borussia+Dortmund+Home" alt="Borussia Dortmund Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Borussia Dortmund Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€84.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FF0000/FFFFFF?text=RB+Leipzig+Home" alt="RB Leipzig Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>RB Leipzig Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€79.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/000000/FFFFFF?text=Bayer+Leverkusen+Home" alt="Bayer Leverkusen Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Bayer Leverkusen Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€79.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ligue 1 -->
    <section class="league-section mb-5">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">
                            <i class="fas fa-gem me-2"></i> Ligue 1 2024-25
                        </h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('jerseys.index', ['league' => 'Ligue 1']) }}" class="btn btn-light btn-sm">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FF1493/FFFFFF?text=PSG+Home" alt="PSG Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Paris Saint-Germain Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€89.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/87CEEB/FFFFFF?text=Marseille+Home" alt="Marseille Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Olympique Marseille Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€79.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FF0000/000000?text=Lyon+Home" alt="Lyon Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>Olympique Lyon Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€74.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="jersey-card">
                            <div class="jersey-image">
                                <img src="https://via.placeholder.com/300x400/FF1493/000000?text=Monaco+Home" alt="Monaco Home" class="img-fluid">
                                <div class="jersey-overlay">
                                    <button class="btn btn-light btn-sm">Quick View</button>
                                </div>
                            </div>
                            <div class="jersey-info p-3">
                                <h5>AS Monaco Home</h5>
                                <p class="text-muted">2024-25 Season</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price fw-bold text-danger">€74.99</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body text-center py-5">
                    <h3 class="mb-3">Can't Find Your Team?</h3>
                    <p class="lead mb-4">
                        We have jerseys from over 500 teams worldwide. Browse our complete collection to find your favorite team's kit.
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ route('jerseys.index') }}" class="btn btn-danger btn-lg">
                            <i class="fas fa-search me-2"></i> Browse All Jerseys
                        </a>
                        <a href="{{ route('jerseys.index', ['category' => 'national-teams']) }}" class="btn btn-outline-danger btn-lg">
                            <i class="fas fa-flag me-2"></i> National Teams
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-envelope me-2"></i> Request Jersey
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #dc3545, #c82333);
        background-attachment: fixed;
    }

    .league-section .card {
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-bottom: 40px;
        border-radius: 15px;
        overflow: hidden;
    }

    .jersey-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        height: 100%;
    }

    .jersey-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .jersey-image {
        position: relative;
        overflow: hidden;
        height: 280px;
    }

    .jersey-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .jersey-card:hover .jersey-image img {
        transform: scale(1.05);
    }

    .jersey-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.8);
        color: white;
        text-align: center;
        padding: 10px;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }

    .jersey-card:hover .jersey-overlay {
        transform: translateY(0);
    }

    .jersey-info h5 {
        color: #333;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .price {
        font-size: 1.2rem;
        font-weight: 700;
    }

    .card-header h3 {
        font-weight: 600;
    }

    .btn-cart {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .hero-section {
            background-attachment: scroll;
        }
        
        .jersey-image {
            height: 220px;
        }
        
        .display-4 {
            font-size: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Add to cart functionality
    $('.btn-danger').on('click', function(e) {
        if ($(this).find('.fa-cart-plus').length > 0) {
            e.preventDefault();
            // Add to cart logic here
            alert('Jersey added to cart! Please select size in product page.');
        }
    });
    
    // Quick view functionality
    $('.jersey-overlay .btn').on('click', function(e) {
        e.preventDefault();
        // Quick view modal logic here
        alert('Quick view coming soon!');
    });
    
    // Smooth scroll for internal links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $($(this).attr('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 800);
        }
    });
});
</script>
@endpush