@extends('layouts.app')

@section('title', 'About Us - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-4">About JerseyShop</h1>
            <p class="lead text-muted">
                Your trusted destination for authentic football jerseys since 2018
            </p>
        </div>
    </div>

    <!-- Our Story -->
    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title text-danger mb-4">
                        <i class="fas fa-book-open me-2"></i> Our Story
                    </h3>
                    <p>
                        Founded in 2018 in the heart of Brussels, JerseyShop was born from a simple passion: 
                        bringing authentic football jerseys to fans across Europe and beyond. What started as 
                        a small family business has grown into one of Europe's most trusted jersey retailers.
                    </p>
                    <p>
                        Our founders, lifelong football enthusiasts, recognized the need for a reliable source 
                        of authentic team jerseys at fair prices. Today, we're proud to serve over 100,000 
                        satisfied customers across 50+ countries.
                    </p>
                    <p>
                        From the latest Premier League releases to rare vintage classics, we've built our 
                        reputation on quality, authenticity, and exceptional customer service.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title text-danger mb-4">
                        <i class="fas fa-bullseye me-2"></i> Our Mission
                    </h3>
                    <p>
                        To connect football fans worldwide with the jerseys they love, ensuring every 
                        customer receives authentic, high-quality products backed by outstanding service.
                    </p>
                    <p>
                        We believe that wearing your team's colors is more than just fashion – it's about 
                        belonging, passion, and celebrating the beautiful game. That's why we're committed 
                        to offering only genuine jerseys from official suppliers.
                    </p>
                    <div class="mt-4">
                        <h5>Our Promise:</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i> 100% Authentic Products</li>
                            <li><i class="fas fa-check text-success me-2"></i> Fast & Secure Shipping</li>
                            <li><i class="fas fa-check text-success me-2"></i> 30-Day Return Guarantee</li>
                            <li><i class="fas fa-check text-success me-2"></i> Expert Customer Support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">Our Values</h3>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon mb-3">
                            <i class="fas fa-shield-alt text-danger fa-3x"></i>
                        </div>
                        <h5>Authenticity</h5>
                        <p>Every jersey is sourced directly from official suppliers and manufacturers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon mb-3">
                            <i class="fas fa-heart text-danger fa-3x"></i>
                        </div>
                        <h5>Passion</h5>
                        <p>We're football fans first, which drives our dedication to excellence</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon mb-3">
                            <i class="fas fa-users text-danger fa-3x"></i>
                        </div>
                        <h5>Community</h5>
                        <p>Building connections between fans and their beloved teams worldwide</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon mb-3">
                            <i class="fas fa-award text-danger fa-3x"></i>
                        </div>
                        <h5>Quality</h5>
                        <p>Premium products and service that exceed customer expectations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card bg-danger text-white">
                <div class="card-body py-5">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <h2 class="display-4 fw-bold mb-2">100K+</h2>
                                <p class="lead mb-0">Happy Customers</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <h2 class="display-4 fw-bold mb-2">500+</h2>
                                <p class="lead mb-0">Team Jerseys</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <h2 class="display-4 fw-bold mb-2">50+</h2>
                                <p class="lead mb-0">Countries Served</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <h2 class="display-4 fw-bold mb-2">7</h2>
                                <p class="lead mb-0">Years of Excellence</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">Meet Our Team</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-image mb-3">
                            <img src="https://tse2.mm.bing.net/th/id/OIP.3vhgjrTwBNxrVsWpd3c8twHaFT?cb=thfvnext&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Managing Director" class="rounded-circle">
                        </div>
                        <h5>Marc Dubois</h5>
                        <p class="text-muted">Managing Director</p>
                        <p class="small">Leading JerseyShop with 15 years of retail experience and an unwavering passion for football.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-image mb-3">
                            <img src="https://tse3.mm.bing.net/th/id/OIP.0tOKEbpH99_7EIVHSGiKEQHaE7?cb=thfvnext&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Sales Lead" class="rounded-circle">
                        </div>
                        <h5>Sophie Laurent</h5>
                        <p class="text-muted">Head of Sales</p>
                        <p class="small">Ensuring our customers find their perfect jersey with expert product knowledge and friendly service.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-image mb-3">
                            <img src="https://f.maformation.fr/edito/sites/3/2020/07/directeur-general.jpeg" alt="Operations Manager" class="rounded-circle">
                        </div>
                        <h5>Lucas Martinez</h5>
                        <p class="text-muted">Operations Manager</p>
                        <p class="small">Managing logistics and ensuring every order reaches customers quickly and safely across Europe.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partnerships -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4">Official Partners</h3>
                    <p class="text-center text-muted mb-4">
                        We work directly with official suppliers and manufacturers to guarantee authenticity
                    </p>
                    <div class="row text-center align-items-center">
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <img src="https://th.bing.com/th/id/R.5a54ed8571a62fb031d256087797c21b?rik=O81X%2fbvOUZuE2g&riu=http%3a%2f%2fwww.pixelstalk.net%2fwp-content%2fuploads%2f2015%2f12%2fnike-logo-wallpapers-white-black.jpg&ehk=OS8whl5LL8mGvd2rrN9gSVQTttmuXNkqsxEUEoaQG84%3d&risl=&pid=ImgRaw&r=0" alt="Nike" class="img-fluid partner-logo">
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <img src="https://static.vecteezy.com/system/resources/previews/019/766/237/original/adidas-logo-adidas-icon-transparent-free-png.png" alt="Adidas" class="img-fluid partner-logo">
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <img src="https://th.bing.com/th/id/R.b37bf719a0579692841d1b15ba99199e?rik=KJqlm%2b%2fJPs7QGQ&riu=http%3a%2f%2flofrev.net%2fwp-content%2fphotos%2f2016%2f06%2fpuma-logo-1-1.jpg&ehk=nQJkwEjVBfLmoRK2H6jFLTeoo9R%2fqJnlSjHV69f5E%2fE%3d&risl=&pid=ImgRaw&r=0" alt="Puma" class="img-fluid partner-logo">
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <img src="https://logos-world.net/wp-content/uploads/2023/01/Umbro-Logo-1980.png" alt="Umbro" class="img-fluid partner-logo">
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <img src="https://logo-marque.com/wp-content/uploads/2021/01/Kappa-Symbole.jpg" alt="Kappa" class="img-fluid partner-logo">
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <img src="https://tse3.mm.bing.net/th/id/OIP.QZsCoVhpaJHVrRTR3kmFTAHaHl?cb=thfvnext&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Macron" class="img-fluid partner-logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sustainability -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h3 class="mb-3">
                                <i class="fas fa-leaf me-2"></i> Our Commitment to Sustainability
                            </h3>
                            <p>
                                We're committed to reducing our environmental impact through eco-friendly packaging, 
                                carbon-neutral shipping options, and partnerships with brands that prioritize sustainability.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check me-2"></i> Recyclable packaging materials</li>
                                <li><i class="fas fa-check me-2"></i> Carbon-neutral shipping options</li>
                                <li><i class="fas fa-check me-2"></i> Supporting sustainable manufacturing</li>
                            </ul>
                        </div>
                        <div class="col-lg-4 text-center">
                            <i class="fas fa-globe fa-5x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact CTA -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body text-center py-5">
                    <h3 class="mb-3">Ready to Find Your Perfect Jersey?</h3>
                    <p class="lead mb-4">
                        Join thousands of satisfied customers and discover our collection of authentic football jerseys
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('jerseys.index') }}" class="btn btn-danger btn-lg">
                            <i class="fas fa-shopping-bag me-2"></i> Shop Now
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-danger btn-lg">
                            <i class="fas fa-envelope me-2"></i> Contact Us
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
    .card {
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    .value-card {
        padding: 30px 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .value-card:hover {
        transform: translateY(-5px);
    }

    .value-icon {
        margin-bottom: 20px;
    }

    .team-card {
        padding: 30px 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .team-card:hover {
        transform: translateY(-5px);
    }

    .team-image img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .stat-item {
        padding: 20px;
    }

    .partner-logo {
        filter: grayscale(100%);
        opacity: 0.7;
        transition: all 0.3s ease;
        max-height: 40px;
    }

    .partner-logo:hover {
        filter: grayscale(0%);
        opacity: 1;
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #dc3545, #c82333);
    }
</style>
@endpush