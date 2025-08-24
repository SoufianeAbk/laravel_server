@extends('layouts.app')

@section('title', 'Shopping Cart - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Shopping Cart</h1>
    
    @if($cartItems->count() > 0)
        <div class="row g-4">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr class="cart-item" data-id="{{ $item->id }}">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $item->jersey->image_url }}" 
                                                         alt="{{ $item->jersey->name }}"
                                                         class="cart-item-image me-3">
                                                    <div>
                                                        <h6 class="mb-0">{{ $item->jersey->name }}</h6>
                                                        <small class="text-muted">
                                                            {{ $item->jersey->team }} • Size: {{ $item->size }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>€{{ number_format($item->price, 2) }}</td>
                                            <td>
                                                <div class="quantity-control">
                                                    <div class="input-group" style="width: 120px;">
                                                        <button class="btn btn-sm btn-outline-secondary qty-decrease" 
                                                                data-id="{{ $item->id }}">-</button>
                                                        <input type="number" class="form-control form-control-sm text-center qty-input" 
                                                               value="{{ $item->quantity }}" min="1" 
                                                               max="{{ $item->jersey->stock_quantity }}"
                                                               data-id="{{ $item->id }}">
                                                        <button class="btn btn-sm btn-outline-secondary qty-increase" 
                                                                data-id="{{ $item->id }}">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="item-total">€{{ number_format($item->price * $item->quantity, 2) }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger remove-item" 
                                                        data-id="{{ $item->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ route('jerseys.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left"></i> Continue Shopping
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger" 
                                        onclick="return confirm('Are you sure you want to clear your cart?')">
                                    <i class="fas fa-trash"></i> Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Coupon Code -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Have a Coupon?</h5>
                        <form class="row g-2">
                            <div class="col-auto flex-grow-1">
                                <input type="text" class="form-control" placeholder="Enter coupon code">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-secondary">Apply Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span id="cart-subtotal">€{{ number_format($subtotal, 2) }}</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Tax (21% VAT):</span>
                            <span id="cart-tax">€{{ number_format($tax, 2) }}</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Shipping:</span>
                            <span id="cart-shipping">
                                @if($shipping == 0)
                                    <span class="text-success">FREE</span>
                                @else
                                    €{{ number_format($shipping, 2) }}
                                @endif
                            </span>
                        </div>
                        
                        @if($subtotal < 50)
                            <div class="alert alert-info mt-3">
                                <small>
                                    <i class="fas fa-info-circle"></i> 
                                    Add €{{ number_format(50 - $subtotal, 2) }} more for free shipping!
                                </small>
                            </div>
                        @endif
                        
                        <hr>
                        
                        <div class="summary-row total">
                            <strong>Total:</strong>
                            <strong id="cart-total">€{{ number_format($total, 2) }}</strong>
                        </div>
                        
                        @auth
                            <a href="{{ route('checkout.index') }}" class="btn btn-danger w-100 mt-3">
                                Proceed to Checkout
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-danger w-100 mt-3">
                                Login to Checkout
                            </a>
                            <p class="text-center mt-2 mb-0">
                                <small>New customer? <a href="{{ route('register') }}">Create an account</a></small>
                            </p>
                        @endauth
                        
                        <div class="mt-4">
                            <h6>We Accept:</h6>
                            <div class="payment-methods">
                                <i class="fab fa-cc-visa fa-2x me-2"></i>
                                <i class="fab fa-cc-mastercard fa-2x me-2"></i>
                                <i class="fab fa-cc-paypal fa-2x me-2"></i>
                                <i class="fab fa-cc-stripe fa-2x"></i>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <div class="security-info">
                                <i class="fas fa-lock text-success"></i>
                                <small>Secure SSL Encrypted Checkout</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Trust Badges -->
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <div class="row g-2">
                            <div class="col-6">
                                <i class="fas fa-shield-alt text-primary fa-2x mb-2"></i>
                                <p class="small mb-0">100% Authentic</p>
                            </div>
                            <div class="col-6">
                                <i class="fas fa-undo text-primary fa-2x mb-2"></i>
                                <p class="small mb-0">30-Day Returns</p>
                            </div>
                            <div class="col-6">
                                <i class="fas fa-truck text-primary fa-2x mb-2"></i>
                                <p class="small mb-0">Fast Delivery</p>
                            </div>
                            <div class="col-6">
                                <i class="fas fa-headset text-primary fa-2x mb-2"></i>
                                <p class="small mb-0">24/7 Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty Cart -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card text-center py-5">
                    <div class="card-body">
                        <i class="fas fa-shopping-cart fa-5x text-muted mb-4"></i>
                        <h3>Your cart is empty</h3>
                        <p class="text-muted mb-4">Looks like you haven't added any items to your cart yet.</p>
                        <a href="{{ route('jerseys.index') }}" class="btn btn-danger btn-lg">
                            Start Shopping
                        </a>
                    </div>
                </div>
                
                <!-- Recommendations -->
                <div class="mt-5">
                    <h4 class="mb-3">Popular Jerseys</h4>
                    <div class="row g-3">
                        <!-- Sample recommendations - would be dynamic in real app -->
                        @for($i = 1; $i <= 4; $i++)
                            <div class="col-md-6 col-lg-3">
                                <div class="product-card">
                                    <img src="https://images.unsplash.com/photo-1668791160369-d20b8175eab2?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                                         alt="Jersey" class="product-image w-100">
                                    <div class="product-info">
                                        <h6>Sample Jersey {{ $i }}</h6>
                                        <p class="product-price">€89.99</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .cart-item-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }
    
    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    
    .summary-row.total {
        font-size: 1.2rem;
        margin-top: 10px;
    }
    
    .payment-methods i {
        color: #6c757d;
    }
    
    .security-info {
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
        height: 200px;
        object-fit: cover;
    }
    
    .product-info {
        padding: 15px;
    }
    
    .product-price {
        font-weight: 700;
        color: var(--accent-color);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Update quantity
        $('.qty-decrease, .qty-increase').click(function() {
            const itemId = $(this).data('id');
            const input = $(`.qty-input[data-id="${itemId}"]`);
            let currentQty = parseInt(input.val());
            const max = parseInt(input.attr('max'));
            
            if ($(this).hasClass('qty-decrease') && currentQty > 1) {
                currentQty--;
            } else if ($(this).hasClass('qty-increase') && currentQty < max) {
                currentQty++;
            }
            
            input.val(currentQty);
            updateCartItem(itemId, currentQty);
        });
        
        // Manual quantity input
        $('.qty-input').change(function() {
            const itemId = $(this).data('id');
            let quantity = parseInt($(this).val());
            const max = parseInt($(this).attr('max'));
            
            if (quantity < 1) quantity = 1;
            if (quantity > max) quantity = max;
            
            $(this).val(quantity);
            updateCartItem(itemId, quantity);
        });
        
        // Remove item
        $('.remove-item').click(function() {
            const itemId = $(this).data('id');
            
            if (confirm('Remove this item from cart?')) {
                $.ajax({
                    url: `/cart/remove/${itemId}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        });
        
        // Update cart item
        function updateCartItem(itemId, quantity) {
            $.ajax({
                url: `/cart/update/${itemId}`,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: quantity
                },
                success: function(response) {
                    location.reload(); // Reload to update totals
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        }
    });
</script>
@endpush