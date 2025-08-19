@extends('layouts.app')

@section('title', 'Shipping Information - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">Shipping Information</h1>
            
            <!-- Shipping Overview -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">
                        <i class="fas fa-truck text-danger me-2"></i> Fast & Reliable Shipping
                    </h3>
                    <p class="lead">
                        We deliver authentic football jerseys to fans across Europe and worldwide. 
                        All orders are processed within 24 hours and shipped with tracking.
                    </p>
                </div>
            </div>

            <!-- Shipping Rates -->
            <div class="card mb-4">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Shipping Rates & Delivery Times</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Region</th>
                                    <th>Standard Shipping</th>
                                    <th>Express Shipping</th>
                                    <th>Free Shipping</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Belgium</strong></td>
                                    <td>€4.99 (2-3 days)</td>
                                    <td>€9.99 (1 day)</td>
                                    <td>Orders over €50</td>
                                </tr>
                                <tr>
                                    <td><strong>Netherlands & Luxembourg</strong></td>
                                    <td>€5.99 (2-4 days)</td>
                                    <td>€12.99 (1-2 days)</td>
                                    <td>Orders over €50</td>
                                </tr>
                                <tr>
                                    <td><strong>Germany & France</strong></td>
                                    <td>€6.99 (3-5 days)</td>
                                    <td>€14.99 (2-3 days)</td>
                                    <td>Orders over €75</td>
                                </tr>
                                <tr>
                                    <td><strong>Rest of EU</strong></td>
                                    <td>€8.99 (4-7 days)</td>
                                    <td>€19.99 (2-4 days)</td>
                                    <td>Orders over €100</td>
                                </tr>
                                <tr>
                                    <td><strong>United Kingdom</strong></td>
                                    <td>€9.99 (5-7 days)</td>
                                    <td>€24.99 (3-5 days)</td>
                                    <td>Orders over €125</td>
                                </tr>
                                <tr>
                                    <td><strong>Rest of World</strong></td>
                                    <td>€14.99 (7-14 days)</td>
                                    <td>€39.99 (4-7 days)</td>
                                    <td>Orders over €150</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Processing Time -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-clock text-danger me-2"></i> Processing Time</h4>
                    <ul>
                        <li>Orders placed before 2:00 PM CET on business days are processed the same day</li>
                        <li>Orders placed after 2:00 PM CET are processed the next business day</li>
                        <li>Custom jerseys with printing take an additional 1-2 business days</li>
                        <li>During peak seasons (holidays, major tournaments), processing may take 2-3 business days</li>
                    </ul>
                </div>
            </div>

            <!-- Shipping Partners -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-handshake text-danger me-2"></i> Our Shipping Partners</h4>
                    <p>We work with trusted carriers to ensure your jerseys arrive safely:</p>
                    <div class="row text-center mt-4">
                        <div class="col-md-3 col-6 mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/DHL_Logo.svg" alt="DHL" height="30">
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/United_Parcel_Service_logo_2014.svg" alt="UPS" height="30">
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/FedEx_logo.svg" alt="FedEx" height="30">
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/DPD_logo.svg" alt="DPD" height="30">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tracking -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-map-marked-alt text-danger me-2"></i> Order Tracking</h4>
                    <p>Once your order ships, you'll receive:</p>
                    <ul>
                        <li>Email confirmation with tracking number</li>
                        <li>SMS updates (if phone number provided)</li>
                        <li>Real-time tracking link</li>
                        <li>Estimated delivery date</li>
                    </ul>
                    <p>Track your order anytime through your account dashboard or using the tracking link provided.</p>
                </div>
            </div>

            <!-- Customs & Duties -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-file-invoice-dollar text-danger me-2"></i> Customs & Import Duties</h4>
                    <div class="alert alert-warning">
                        <strong>Important for International Orders:</strong>
                    </div>
                    <ul>
                        <li>EU customers: No additional customs fees</li>
                        <li>UK customers: May be subject to import VAT and handling fees</li>
                        <li>Rest of World: Import duties and taxes may apply based on your country's regulations</li>
                        <li>Customers are responsible for any customs fees or import duties</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ -->
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Frequently Asked Questions</h4>
                </div>
                <div class="card-body">
                    <div class="accordion" id="shippingFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Can I change my shipping address after placing an order?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#shippingFAQ">
                                <div class="accordion-body">
                                    Yes, you can change your shipping address within 1 hour of placing your order. 
                                    Contact our customer service immediately at support@jerseyshop.com.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Do you ship to P.O. boxes?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#shippingFAQ">
                                <div class="accordion-body">
                                    We can ship to P.O. boxes for standard shipping only. Express shipping requires a physical address.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What happens if my package is lost or damaged?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#shippingFAQ">
                                <div class="accordion-body">
                                    All shipments are insured. If your package is lost or damaged, contact us immediately 
                                    and we'll send a replacement or issue a full refund.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="text-center mt-5">
                <h4>Have More Questions?</h4>
                <p>Our customer service team is here to help!</p>
                <a href="{{ route('contact') }}" class="btn btn-danger btn-lg">
                    <i class="fas fa-envelope me-2"></i> Contact Us
                </a>
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

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .accordion-button:not(.collapsed) {
        background-color: #fff5f5;
        color: var(--bs-danger);
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(233, 69, 96, 0.25);
    }
</style>
@endpush