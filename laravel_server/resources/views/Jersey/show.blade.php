@extends('layouts.app')

@section('title', $jersey->name . ' - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jerseys.index') }}">Jerseys</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jerseys.index', ['league' => $jersey->league]) }}">{{ $jersey->league }}</a></li>
            <li class="breadcrumb-item active">{{ $jersey->name }}</li>
        </ol>
    </nav>
    
    <div class="row g-5">
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="product-gallery">
                <div class="main-image mb-3">
                    <img src="{{ $jersey->image_url }}" alt="{{ $jersey->name }}" 
                         class="img-fluid rounded" id="mainImage">
                </div>
                <div class="thumbnail-images d-flex gap-2">
                    <!-- Additional images would go here -->
                    <img src="{{ $jersey->image_url }}" alt="{{ $jersey->name }}" 
                         class="thumbnail active" onclick="changeImage(this)">
                </div>
            </div>
        </div>
        
        <!-- Product Details -->
        <div class="col-lg-6">
            <div class="product-details">
                @if($jersey->is_featured)
                    <span class="badge bg-danger mb-2">Featured</span>
                @endif
                
                <h1 class="product-name mb-3">{{ $jersey->name }}</h1>
                
                <div class="product-meta mb-3">
                    <p class="mb-2"><strong>Team:</strong> {{ $jersey->team }}</p>
                    <p class="mb-2"><strong>League:</strong> {{ $jersey->league }}</p>
                    <p class="mb-2"><strong>Season:</strong> {{ $jersey->season }}</p>
                    <p class="mb-2"><strong>Type:</strong> {{ ucfirst($jersey->type) }}</p>
                    @if($jersey->player_name)
                        <p class="mb-2"><strong>Player:</strong> {{ $jersey->player_name }} 
                            @if($jersey->player_number)
                                #{{ $jersey->player_number }}
                            @endif
                        </p>
                    @endif
                </div>
                
                <div class="price-section mb-4">
                    <h2 class="product-price text-danger">{{ $jersey->formatted_price }}</h2>
                    @if($jersey->stock_quantity > 0)
                        <span class="badge bg-success">In Stock ({{ $jersey->stock_quantity }} available)</span>
                    @else
                        <span class="badge bg-secondary">Out of Stock</span>
                    @endif
                </div>
                
                <div class="product-description mb-4">
                    <h5>Description</h5>
                    <p>{{ $jersey->description }}</p>
                </div>
                
                @if($jersey->stock_quantity > 0)
                    <form id="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="jersey_id" value="{{ $jersey->id }}">
                        
                        <!-- Size Selection -->
                        <div class="size-selection mb-4">
                            <label class="form-label fw-bold">Select Size:</label>
                            <div class="btn-group w-100" role="group">
                                @foreach($jersey->available_sizes as $size)
                                    <input type="radio" class="btn-check" name="size" 
                                           id="size-{{ $size }}" value="{{ $size }}"
                                           {{ $loop->first ? 'checked' : '' }}>
                                    <label class="btn btn-outline-dark" for="size-{{ $size }}">{{ $size }}</label>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Quantity Selection -->
                        <div class="quantity-selection mb-4">
                            <label class="form-label fw-bold">Quantity:</label>
                            <div class="input-group" style="max-width: 150px;">
                                <button class="btn btn-outline-secondary" type="button" id="qty-minus">-</button>
                                <input type="number" class="form-control text-center" name="quantity" 
                                       id="quantity" value="1" min="1" max="{{ $jersey->stock_quantity }}">
                                <button class="btn btn-outline-secondary" type="button" id="qty-plus">+</button>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="action-buttons d-flex gap-3">
                            <button type="submit" class="btn btn-danger btn-lg flex-grow-1">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                            @auth
                                <button type="button" class="btn btn-outline-danger btn-lg wishlist-toggle" 
                                        data-id="{{ $jersey->id }}">
                                    <i class="far fa-heart"></i>
                                </button>
                            @endauth
                        </div>
                    </form>
                @else
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> This item is currently out of stock.
                    </div>
                @endif
                
                <!-- Product Features -->
                <div class="product-features mt-5">
                    <h5 class="mb-3">Product Features</h5>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-success"></i> Authentic Design
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-success"></i> Premium Quality
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-success"></i> Official Licensed
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-success"></i> Breathable Fabric
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Info -->
                <div class="shipping-info mt-4 p-3 bg-light rounded">
                    <h6 class="mb-2">Shipping Information</h6>
                    <p class="mb-1"><i class="fas fa-truck"></i> Free shipping on orders over €50</p>
                    <p class="mb-1"><i class="fas fa-calendar"></i> Estimated delivery: 3-5 business days</p>
                    <p class="mb-0"><i class="fas fa-undo"></i> 30-day return policy</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Product Tabs -->
    <div class="row mt-5">
        <div class="col-12">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab" 
                            data-bs-target="#details" type="button">Product Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sizing-tab" data-bs-toggle="tab" 
                            data-bs-target="#sizing" type="button">Size Guide</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" 
                            data-bs-target="#shipping" type="button">Shipping & Returns</button>
                </li>
            </ul>
            <div class="tab-content p-4 bg-white" id="productTabContent">
                <div class="tab-pane fade show active" id="details" role="tabpanel">
                    <h5>Product Details</h5>
                    <ul>
                        <li>Official {{ $jersey->team }} {{ $jersey->type }} jersey for {{ $jersey->season }} season</li>
                        <li>Made with high-quality breathable polyester fabric</li>
                        <li>Features team crest and sponsor logos</li>
                        <li>Machine washable at 30°C</li>
                        <li>Slim fit design for optimal performance</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="sizing" role="tabpanel">
                    <h5>Size Guide</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Chest (cm)</th>
                                <th>Length (cm)</th>
                                <th>Sleeve (cm)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>S</td>
                                <td>88-96</td>
                                <td>68</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td>M</td>
                                <td>96-104</td>
                                <td>70</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <td>L</td>
                                <td>104-112</td>
                                <td>72</td>
                                <td>19</td>
                            </tr>
                            <tr>
                                <td>XL</td>
                                <td>112-120</td>
                                <td>74</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>XXL</td>
                                <td>120-128</td>
                                <td>76</td>
                                <td>21</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <h5>Shipping & Returns</h5>
                    <h6>Shipping</h6>
                    <ul>
                        <li>Standard Shipping (3-5 business days): €5.99</li>
                        <li>Express Shipping (1-2 business days): €12.99</li>
                        <li>Free shipping on orders over €50</li>
                    </ul>
                    <h6 class="mt-3">Returns</h6>
                    <ul>
                        <li>30-day return policy</li>
                        <li>Items must be unworn and with original tags</li>
                        <li>Return shipping costs are the responsibility of the customer</li>
                        <li>Refunds processed within 5-7 business days</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Products -->
    @if($relatedJerseys->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Related Products</h3>
                <div class="row g-4">
                    @foreach($relatedJerseys as $related)
                        <div class="col-md-6 col-lg-3">
                            <div class="product-card">
                                <a href="{{ route('jerseys.show', $related->id) }}">
                                    <img src="{{ $related->image_url }}" alt="{{ $related->name }}" 
                                         class="product-image w-100">
                                </a>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="{{ route('jerseys.show', $related->id) }}">{{ $related->name }}</a>
                                    </h6>
                                    <p class="product-team">{{ $related->team }}</p>
                                    <p class="product-price">{{ $related->formatted_price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .product-gallery {
        position: sticky;
        top: 100px;
    }
    
    .main-image img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }
    
    .thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
        cursor: pointer;
        opacity: 0.6;
        transition: all 0.3s;
        border: 2px solid transparent;
    }
    
    .thumbnail:hover,
    .thumbnail.active {
        opacity: 1;
        border-color: var(--accent-color);
    }
    
    .product-name {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .product-price {
        font-size: 2rem;
        font-weight: 700;
    }
    
    .feature-item {
        padding: 10px;
        background: #f8f9fa;
        border-radius: 5px;
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
    
    .product-image {
        height: 250px;
        object-fit: cover;
    }
    
    .product-info {
        padding: 15px;
    }
    
    .product-title a {
        color: var(--primary-color);
        text-decoration: none;
    }
    
    .wishlist-toggle.active i {
        color: var(--accent-color);
        font-weight: 900;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Quantity buttons
        $('#qty-minus').click(function() {
            let qty = parseInt($('#quantity').val());
            if (qty > 1) {
                $('#quantity').val(qty - 1);
            }
        });
        
        $('#qty-plus').click(function() {
            let qty = parseInt($('#quantity').val());
            let max = parseInt($('#quantity').attr('max'));
            if (qty < max) {
                $('#quantity').val(qty + 1);
            }
        });
        
        // Add to cart
        $('#add-to-cart-form').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '{{ route("cart.add") }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    updateCartCount();
                    // Show success message
                    alert(response.message);
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });
        
        // Wishlist toggle
        $('.wishlist-toggle').click(function() {
            const btn = $(this);
            const jerseyId = btn.data('id');
            
            $.ajax({
                url: '{{ route("wishlist.add") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    jersey_id: jerseyId
                },
                success: function(response) {
                    btn.toggleClass('active');
                    btn.find('i').toggleClass('far fas');
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        window.location.href = '{{ route("login") }}';
                    }
                }
            });
        });
    });
    
    // Change main image
    function changeImage(thumb) {
        document.getElementById('mainImage').src = thumb.src;
        document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
        thumb.classList.add('active');
    }
</script>
@endpush