@extends('layouts.app')

@section('title', 'Frequently Asked Questions - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4 text-center">Frequently Asked Questions</h1>
            <p class="lead text-center text-muted mb-5">
                Find answers to the most common questions about our jerseys, orders, and services
            </p>

            <!-- Search FAQ -->
            <div class="card mb-5">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search FAQs..." id="faqSearch">
                        <button class="btn btn-danger" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- FAQ Categories -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" name="faqCategory" id="all" checked>
                        <label class="btn btn-outline-danger" for="all">All</label>
                        
                        <input type="radio" class="btn-check" name="faqCategory" id="orders">
                        <label class="btn btn-outline-danger" for="orders">Orders</label>
                        
                        <input type="radio" class="btn-check" name="faqCategory" id="shipping">
                        <label class="btn btn-outline-danger" for="shipping">Shipping</label>
                        
                        <input type="radio" class="btn-check" name="faqCategory" id="returns">
                        <label class="btn btn-outline-danger" for="returns">Returns</label>
                        
                        <input type="radio" class="btn-check" name="faqCategory" id="products">
                        <label class="btn btn-outline-danger" for="products">Products</label>
                    </div>
                </div>
            </div>

            <!-- FAQ Accordion -->
            <div class="accordion" id="faqAccordion">
                
                <!-- Orders -->
                <div class="faq-item" data-category="orders">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How can I track my order?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can track your order by logging into your account and visiting "My Orders". 
                                Once your order ships, you'll receive an email with a tracking number and link. 
                                You can also track directly on our website or the carrier's site.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-category="orders">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Can I modify or cancel my order?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can modify or cancel your order within 1 hour of placing it. 
                                After this time, your order may have already been processed for shipment. 
                                Contact our customer service immediately if you need to make changes.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-category="orders">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We accept all major credit cards (Visa, Mastercard, American Express), 
                                PayPal, Apple Pay, Google Pay, and bank transfers. All payments are processed securely 
                                with SSL encryption.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping -->
                <div class="faq-item" data-category="shipping">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How long does shipping take?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Shipping times vary by location:
                                <ul class="mt-2">
                                    <li>Belgium: 2-3 days (standard), 1 day (express)</li>
                                    <li>EU: 3-7 days (standard), 2-4 days (express)</li>
                                    <li>UK: 5-7 days (standard), 3-5 days (express)</li>
                                    <li>Rest of World: 7-14 days (standard), 4-7 days (express)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-category="shipping">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                Do you offer free shipping?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We offer free standard shipping on orders over €50 within Belgium and nearby countries. 
                                Free shipping thresholds vary by region - check our shipping page for details.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Returns -->
                <div class="faq-item" data-category="returns">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                What is your return policy?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer a 30-day return guarantee. Items must be unworn, unwashed, 
                                with original tags attached. Custom printed jerseys can only be returned if defective. 
                                Return shipping is free for defective items, €5.99 for other returns.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-category="returns">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                How do I initiate a return?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Log into your account, go to "My Orders", find your order and click "Return Item". 
                                We'll email you a prepaid return label. Pack the item in original packaging 
                                and drop it off at any authorized shipping location.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="faq-item" data-category="products">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                Are your jerseys authentic?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, all our jerseys are 100% authentic and sourced directly from official suppliers 
                                and manufacturers. We work with Nike, Adidas, Puma, and other licensed brands. 
                                Every jersey comes with authenticity guarantees.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-category="products">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                Can I customize jerseys with names and numbers?
                            </button>
                        </h2>
                        <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We offer professional customization with official fonts and numbers. 
                                Customization adds 1-2 business days to processing time. We use heat-press 
                                technology for durability. Free customization on orders over €100.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-category="products">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                How do I choose the right size?
                            </button>
                        </h2>
                        <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Check our comprehensive <a href="{{ route('size-guide') }}">Size Guide</a> 
                                which includes measurements for all brands and fit types. 
                                Most jerseys run true to size, but some brands may vary slightly. 
                                We offer free size exchanges if needed.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- General -->
                <div class="faq-item" data-category="general">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq11">
                                Do you have a physical store?
                            </button>
                        </h2>
                        <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, our showroom is located at Rue de la Loi 42, 1000 Brussels, Belgium. 
                                We're open Monday-Friday 9AM-6PM and Saturday 10AM-4PM. 
                                Please call ahead to ensure the jerseys you want to see are available.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-category="general">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq12">
                                How can I contact customer service?
                            </button>
                        </h2>
                        <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Contact us via:
                                <ul class="mt-2">
                                    <li>Email: support@jerseyshop.com</li>
                                    <li>Phone: +32 2 555 0123</li>
                                    <li>Live chat on our website</li>
                                    <li>Contact form on our <a href="{{ route('contact') }}">Contact page</a></li>
                                </ul>
                                We typically respond within 24 hours.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Still Need Help -->
            <div class="card mt-5 bg-light">
                <div class="card-body text-center py-4">
                    <h4 class="mb-3">Didn't find what you're looking for?</h4>
                    <p class="text-muted mb-4">Our customer service team is ready to help with any questions</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-danger">
                            <i class="fas fa-envelope me-2"></i> Contact Us
                        </a>
                        <a href="tel:+3225550123" class="btn btn-outline-danger">
                            <i class="fas fa-phone me-2"></i> Call Us
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

    .accordion-button:not(.collapsed) {
        background-color: #fff5f5;
        color: var(--bs-danger);
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(233, 69, 96, 0.25);
    }

    .btn-check:checked + .btn-outline-danger {
        background-color: var(--bs-danger);
        border-color: var(--bs-danger);
        color: white;
    }

    .faq-item {
        transition: opacity 0.3s ease;
    }

    .faq-item.hidden {
        display: none;
    }

    #faqSearch {
        border-color: var(--bs-danger);
    }

    #faqSearch:focus {
        border-color: var(--bs-danger);
        box-shadow: 0 0 0 0.25rem rgba(233, 69, 96, 0.25);
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // FAQ Search
    $('#faqSearch').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('.faq-item').each(function() {
            const text = $(this).text().toLowerCase();
            if (text.indexOf(searchTerm) > -1) {
                $(this).removeClass('hidden');
            } else {
                $(this).addClass('hidden');
            }
        });
    });

    // Category Filter
    $('input[name="faqCategory"]').on('change', function() {
        const category = $(this).attr('id');
        
        if (category === 'all') {
            $('.faq-item').removeClass('hidden');
        } else {
            $('.faq-item').addClass('hidden');
            $(`.faq-item[data-category="${category}"]`).removeClass('hidden');
        }
    });
});
</script>
@endpush