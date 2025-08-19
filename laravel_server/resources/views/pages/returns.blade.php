@extends('layouts.app')

@section('title', 'Returns & Exchanges - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">Returns & Exchanges</h1>
            
            <!-- Returns Overview -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">
                        <i class="fas fa-undo-alt text-danger me-2"></i> 30-Day Return Guarantee
                    </h3>
                    <p class="lead">
                        We want you to be completely satisfied with your purchase. If you're not happy with your jersey, 
                        you can return it within 30 days for a full refund or exchange.
                    </p>
                </div>
            </div>

            <!-- Return Policy -->
            <div class="card mb-4">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Return Policy</h4>
                </div>
                <div class="card-body">
                    <h5>Eligible for Return:</h5>
                    <ul class="mb-4">
                        <li>Items must be returned within 30 days of delivery</li>
                        <li>Jerseys must be unworn, unwashed, and in original condition</li>
                        <li>All original tags must be attached</li>
                        <li>Items must be in original packaging</li>
                        <li>Include the original invoice or order confirmation</li>
                    </ul>

                    <h5>Not Eligible for Return:</h5>
                    <ul>
                        <li>Custom jerseys with personalized printing (unless defective)</li>
                        <li>Items marked as "Final Sale"</li>
                        <li>Jerseys that have been worn or washed</li>
                        <li>Items without original tags</li>
                        <li>Returns requested after 30 days</li>
                    </ul>
                </div>
            </div>

            <!-- How to Return -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-list-ol text-danger me-2"></i> How to Return an Item</h4>
                    
                    <div class="return-steps mt-4">
                        <div class="step mb-4">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h5>Initiate Return</h5>
                                <p>Log in to your account and go to "My Orders". Select the item you want to return and click "Return Item".</p>
                            </div>
                        </div>
                        
                        <div class="step mb-4">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h5>Print Return Label</h5>
                                <p>We'll email you a prepaid return shipping label. Print it and attach it to your package.</p>
                            </div>
                        </div>
                        
                        <div class="step mb-4">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h5>Pack Your Item</h5>
                                <p>Place the jersey in its original packaging with all tags attached. Include the return form.</p>
                            </div>
                        </div>
                        
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h5>Ship It Back</h5>
                                <p>Drop off your package at any authorized shipping location. Keep the tracking number for reference.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exchange Policy -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Exchange Policy</h4>
                </div>
                <div class="card-body">
                    <p>Need a different size or prefer another jersey? We're happy to help with exchanges!</p>
                    
                    <h5 class="mt-3">Exchange Process:</h5>
                    <ol>
                        <li>Follow the same return process above</li>
                        <li>Select "Exchange" instead of "Return"</li>
                        <li>Choose your new size or jersey</li>
                        <li>We'll ship your replacement as soon as we receive your return</li>
                    </ol>
                    
                    <div class="alert alert-info mt-3">
                        <strong>Note:</strong> If the new item costs more, we'll charge the difference. 
                        If it costs less, we'll refund the difference.
                    </div>
                </div>
            </div>

            <!-- Refund Information -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-money-bill-wave text-danger me-2"></i> Refund Information</h4>
                    
                    <h5>Processing Time:</h5>
                    <ul>
                        <li>Refunds are processed within 5-7 business days after we receive your return</li>
                        <li>Credit card refunds may take 3-5 additional business days to appear</li>
                        <li>PayPal refunds are usually instant</li>
                        <li>Bank transfer refunds may take 5-10 business days</li>
                    </ul>
                    
                    <h5>Refund Amount:</h5>
                    <ul>
                        <li>Full refund for items returned within 30 days</li>
                        <li>Original shipping costs are non-refundable (except for defective items)</li>
                        <li>Return shipping is free for defective or incorrect items</li>
                        <li>Return shipping costs €5.99 for change of mind returns</li>
                    </ul>
                </div>
            </div>

            <!-- Damaged or Defective Items -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-exclamation-triangle text-warning me-2"></i> Damaged or Defective Items</h4>
                    
                    <p>If you receive a damaged or defective jersey:</p>
                    <ol>
                        <li>Contact us within 48 hours of delivery</li>
                        <li>Send photos of the damage/defect to support@jerseyshop.com</li>
                        <li>We'll send a replacement immediately or issue a full refund</li>
                        <li>No need to return the damaged item</li>
                    </ol>
                    
                    <div class="alert alert-success">
                        <strong>Quality Guarantee:</strong> All defective items are replaced free of charge, 
                        including shipping costs.
                    </div>
                </div>
            </div>

            <!-- International Returns -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4><i class="fas fa-globe text-danger me-2"></i> International Returns</h4>
                    
                    <p>For orders shipped outside the EU:</p>
                    <ul>
                        <li>Return shipping costs are the customer's responsibility</li>
                        <li>We recommend using tracked shipping for returns</li>
                        <li>Customs duties paid on original order are non-refundable</li>
                        <li>Allow 10-14 business days for international return processing</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ -->
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Frequently Asked Questions</h4>
                </div>
                <div class="card-body">
                    <div class="accordion" id="returnsFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Can I return a jersey if I removed the tags?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#returnsFAQ">
                                <div class="accordion-body">
                                    Unfortunately, we cannot accept returns without original tags. This policy ensures 
                                    all customers receive brand new, unworn items.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Can I exchange a custom printed jersey?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#returnsFAQ">
                                <div class="accordion-body">
                                    Custom printed jerseys can only be exchanged if there's a printing error or defect. 
                                    We cannot accept returns for spelling errors if approved by the customer.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How long does the return process take?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#returnsFAQ">
                                <div class="accordion-body">
                                    Once we receive your return, we process it within 5-7 business days. 
                                    The refund appears in your account within 3-10 days depending on your payment method.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="text-center mt-5">
                <h4>Need Help with a Return?</h4>
                <p>Our customer service team is here to assist you!</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-danger btn-lg">
                        <i class="fas fa-envelope me-2"></i> Contact Us
                    </a>
                    <a href="tel:+3225550123" class="btn btn-outline-danger btn-lg">
                        <i class="fas fa-phone me-2"></i> Call Us
                    </a>
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

    .return-steps {
        position: relative;
        padding-left: 40px;
    }

    .return-steps::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 30px;
        bottom: 30px;
        width: 2px;
        background: #dee2e6;
    }

    .step {
        display: flex;
        align-items: start;
        position: relative;
    }

    .step-number {
        position: absolute;
        left: -40px;
        width: 30px;
        height: 30px;
        background: var(--bs-danger);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .step-content {
        padding-left: 20px;
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