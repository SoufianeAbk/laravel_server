@extends('layouts.app')

@section('title', 'Contact Us - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-4">Contact Us</h1>
            <p class="lead text-muted">
                We're here to help! Get in touch with our friendly customer service team
            </p>
        </div>
    </div>

    <div class="row">
        <!-- Contact Form -->
        <div class="col-lg-8 mb-5">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-envelope me-2"></i> Send Us a Message
                    </h3>
                </div>
                <div class="card-body">
                    <div id="contactAlert" class="alert alert-success d-none" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        Thank you for your message! We'll get back to you within 24 hours.
                    </div>
                    
                    <div id="contactForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="orderNumber" class="form-label">Order Number (if applicable)</label>
                            <input type="text" class="form-control" id="orderNumber" placeholder="e.g., JS-2025-001234">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject *</label>
                            <select class="form-select" id="subject" required>
                                <option value="">Select a subject</option>
                                <option value="order_inquiry">Order Inquiry</option>
                                <option value="product_question">Product Question</option>
                                <option value="return_exchange">Return/Exchange</option>
                                <option value="shipping_delivery">Shipping & Delivery</option>
                                <option value="technical_issue">Technical Issue</option>
                                <option value="customization">Customization Request</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" rows="6" placeholder="Tell us how we can help you..." required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Subscribe to our newsletter for updates and special offers
                                </label>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-danger btn-lg" onclick="submitContactForm()">
                            <i class="fas fa-paper-plane me-2"></i> Send Message
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-lg-4">
            <!-- Contact Details -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i> Contact Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="contact-item mb-3">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-map-marker-alt text-danger"></i>
                            </div>
                            <div>
                                <strong>Address</strong><br>
                                <span class="text-muted">
                                    Rue de la Loi 42<br>
                                    1000 Brussels, Belgium
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-3">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-phone text-danger"></i>
                            </div>
                            <div>
                                <strong>Phone</strong><br>
                                <a href="tel:+3225550123" class="text-decoration-none">+32 2 555 0123</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-3">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-envelope text-danger"></i>
                            </div>
                            <div>
                                <strong>Email</strong><br>
                                <a href="mailto:support@jerseyshop.com" class="text-decoration-none">support@jerseyshop.com</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-comments text-danger"></i>
                            </div>
                            <div>
                                <strong>Live Chat</strong><br>
                                <span class="text-muted">Available on our website</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-clock me-2"></i> Business Hours
                    </h5>
                </div>
                <div class="card-body">
                    <div class="business-hours">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Monday - Friday</span>
                            <span class="fw-bold">9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Saturday</span>
                            <span class="fw-bold">10:00 AM - 4:00 PM</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Sunday</span>
                            <span class="text-muted">Closed</span>
                        </div>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            All times are Central European Time (CET)
                        </small>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card mb-4">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="fas fa-question-circle me-2"></i> Quick Help
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('shipping') }}" class="btn btn-outline-primary">
                            <i class="fas fa-truck me-2"></i> Shipping Info
                        </a>
                        <a href="{{ route('returns') }}" class="btn btn-outline-primary">
                            <i class="fas fa-undo me-2"></i> Returns & Exchanges
                        </a>
                        <a href="{{ route('size-guide') }}" class="btn btn-outline-primary">
                            <i class="fas fa-ruler me-2"></i> Size Guide
                        </a>
                        <a href="{{ route('faq') }}" class="btn btn-outline-primary">
                            <i class="fas fa-question me-2"></i> FAQ
                        </a>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-share-alt me-2"></i> Follow Us
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-outline-primary rounded-circle social-btn">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-outline-info rounded-circle social-btn">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger rounded-circle social-btn">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-dark rounded-circle social-btn">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                    <p class="mt-3 mb-0 small text-muted">
                        Follow us for the latest jersey releases and exclusive offers!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-map me-2"></i> Find Our Store
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="map-placeholder bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                        <div class="text-center text-muted">
                            <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                            <h5>Interactive Map</h5>
                            <p>Rue de la Loi 42, 1000 Brussels, Belgium</p>
                            <button class="btn btn-primary" onclick="openMaps()">
                                <i class="fas fa-external-link-alt me-2"></i> Open in Maps
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-question-circle me-2"></i> Frequently Asked Questions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="contactFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How can I track my order?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    You can track your order by logging into your account and visiting the "My Orders" section. 
                                    You'll also receive a tracking email once your order ships.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What's your response time for customer inquiries?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    We typically respond to all inquiries within 24 hours during business days. 
                                    For urgent matters, please call our customer service line.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Can I visit your physical store?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Yes! Our showroom is open to visitors. Please call ahead to ensure we have the jerseys 
                                    you're interested in available for viewing.
                                </div>
                            </div>
                        </div>
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

    .card-header {
        font-weight: 600;
    }

    .contact-item {
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .contact-item:last-child {
        border-bottom: none;
    }

    .contact-icon {
        width: 30px;
        text-align: center;
        font-size: 1.2rem;
    }

    .social-btn {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        transform: translateY(-3px);
    }

    .business-hours {
        line-height: 1.8;
    }

    .map-placeholder {
        background: linear-gradient(45deg, #f8f9fa 25%, transparent 25%), 
                    linear-gradient(-45deg, #f8f9fa 25%, transparent 25%), 
                    linear-gradient(45deg, transparent 75%, #f8f9fa 75%), 
                    linear-gradient(-45deg, transparent 75%, #f8f9fa 75%);
        background-size: 20px 20px;
        background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
    }

    .accordion-button:not(.collapsed) {
        background-color: #fff5f5;
        color: var(--bs-danger);
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(233, 69, 96, 0.25);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--bs-danger);
        box-shadow: 0 0 0 0.25rem rgba(233, 69, 96, 0.25);
    }
</style>
@endpush

@push('scripts')
<script>
function submitContactForm() {
    // Simulate form submission
    const form = document.getElementById('contactForm');
    const alert = document.getElementById('contactAlert');
    
    // Basic validation
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    
    if (!firstName || !lastName || !email || !subject || !message) {
        alert('Please fill in all required fields.');
        return;
    }
    
    // Simulate API call
    setTimeout(() => {
        form.style.display = 'none';
        alert.classList.remove('d-none');
        
        // Scroll to alert
        alert.scrollIntoView({ behavior: 'smooth' });
    }, 500);
}

function openMaps() {
    const address = "Rue de la Loi 42, 1000 Brussels, Belgium";
    const encodedAddress = encodeURIComponent(address);
    window.open(`https://www.google.com/maps/search/?api=1&query=${encodedAddress}`, '_blank');
}
</script>
@endpush