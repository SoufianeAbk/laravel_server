@extends('layouts.app')

@section('title', 'Checkout - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Checkout</h1>
    
    <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
        @csrf
        
        <div class="row g-4">
            <!-- Billing/Shipping Information -->
            <div class="col-lg-8">
                <!-- Customer Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Customer Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                       name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                       name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" required>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', $user->email ?? '') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       name="phone" value="{{ old('phone', $user->phone ?? '') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Address -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Shipping Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Street Address *</label>
                                <input type="text" class="form-control @error('shipping_address') is-invalid @enderror" 
                                       name="shipping_address" value="{{ old('shipping_address') }}" 
                                       placeholder="123 Main Street" required>
                                @error('shipping_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City *</label>
                                <input type="text" class="form-control @error('shipping_city') is-invalid @enderror" 
                                       name="shipping_city" value="{{ old('shipping_city') }}" required>
                                @error('shipping_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Postal Code *</label>
                                <input type="text" class="form-control @error('shipping_postal_code') is-invalid @enderror" 
                                       name="shipping_postal_code" value="{{ old('shipping_postal_code') }}" required>
                                @error('shipping_postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Country *</label>
                                <select class="form-select @error('shipping_country') is-invalid @enderror" 
                                        name="shipping_country" required>
                                    <option value="">Select Country</option>
                                    <option value="Belgium" {{ old('shipping_country') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                    <option value="Netherlands" {{ old('shipping_country') == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                    <option value="France" {{ old('shipping_country') == 'France' ? 'selected' : '' }}>France</option>
                                    <option value="Germany" {{ old('shipping_country') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                    <option value="United Kingdom" {{ old('shipping_country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="Spain" {{ old('shipping_country') == 'Spain' ? 'selected' : '' }}>Spain</option>
                                    <option value="Italy" {{ old('shipping_country') == 'Italy' ? 'selected' : '' }}>Italy</option>
                                </select>
                                @error('shipping_country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="billing_same" 
                                   name="billing_same" checked>
                            <label class="form-check-label" for="billing_same">
                                Billing address same as shipping
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Billing Address (hidden by default) -->
                <div class="card mb-4" id="billing-address-card" style="display: none;">
                    <div class="card-header">
                        <h5 class="mb-0">Billing Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Street Address</label>
                                <input type="text" class="form-control" name="billing_address" 
                                       value="{{ old('billing_address') }}" placeholder="123 Main Street">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="billing_city" 
                                       value="{{ old('billing_city') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Postal Code</label>
                                <input type="text" class="form-control" name="billing_postal_code" 
                                       value="{{ old('billing_postal_code') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Country</label>
                                <select class="form-select" name="billing_country">
                                    <option value="">Select Country</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Italy">Italy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Method -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Payment Method</h5>
                    </div>
                    <div class="card-body">
                        <div class="payment-methods">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="credit_card" value="credit_card" checked>
                                <label class="form-check-label" for="credit_card">
                                    <i class="fas fa-credit-card me-2"></i> Credit/Debit Card
                                </label>
                            </div>
                            
                            <div class="card-payment-fields mb-3">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <input type="text" class="form-control" placeholder="Card Number" 
                                               id="card_number" maxlength="19">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Cardholder Name" 
                                               id="card_name">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="MM/YY" 
                                               id="card_expiry" maxlength="5">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="CVV" 
                                               id="card_cvv" maxlength="4">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="paypal" value="paypal">
                                <label class="form-check-label" for="paypal">
                                    <i class="fab fa-paypal me-2"></i> PayPal
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="bank_transfer" value="bank_transfer">
                                <label class="form-check-label" for="bank_transfer">
                                    <i class="fas fa-university me-2"></i> Bank Transfer
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Notes -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Order Notes (Optional)</h5>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" name="notes" rows="3" 
                                  placeholder="Add any special instructions for your order...">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card sticky-top" style="top: 90px;">
                    <div class="card-header">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <!-- Cart Items -->
                        <div class="order-items mb-3">
                            @foreach($cartItems as $item)
                                <div class="order-item mb-2 pb-2 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $item->jersey->name }}</strong><br>
                                            <small class="text-muted">
                                                Size: {{ $item->size }} | Qty: {{ $item->quantity }}
                                            </small>
                                        </div>
                                        <div class="text-end">
                                            €{{ number_format($item->price * $item->quantity, 2) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Totals -->
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span>€{{ number_format($subtotal, 2) }}</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Tax (21% VAT):</span>
                            <span>€{{ number_format($tax, 2) }}</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Shipping:</span>
                            <span>
                                @if($shipping == 0)
                                    <span class="text-success">FREE</span>
                                @else
                                    €{{ number_format($shipping, 2) }}
                                @endif
                            </span>
                        </div>
                        
                        <hr>
                        
                        <div class="summary-row total">
                            <strong>Total:</strong>
                            <strong>€{{ number_format($total, 2) }}</strong>
                        </div>
                        
                        <!-- Terms and Conditions -->
                        <div class="form-check mt-4">
                            <input class="form-check-input @error('terms') is-invalid @enderror" 
                                   type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="{{ route('terms') }}" target="_blank">Terms & Conditions</a>
                            </label>
                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-danger w-100 mt-3 btn-lg">
                            <i class="fas fa-lock me-2"></i> Place Order
                        </button>
                        
                        <!-- Security Badge -->
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt text-success"></i> 
                                Secure SSL Encrypted Payment
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    
    .summary-row.total {
        font-size: 1.2rem;
        margin-top: 10px;
    }
    
    .order-item {
        font-size: 0.9rem;
    }
    
    .card-payment-fields {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 5px;
    }
    
    .payment-methods .form-check-label {
        cursor: pointer;
        font-weight: 500;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Toggle billing address
        $('#billing_same').change(function() {
            if ($(this).is(':checked')) {
                $('#billing-address-card').hide();
            } else {
                $('#billing-address-card').show();
            }
        });
        
        // Payment method change
        $('input[name="payment_method"]').change(function() {
            if ($(this).val() === 'credit_card') {
                $('.card-payment-fields').show();
            } else {
                $('.card-payment-fields').hide();
            }
        });
        
        // Format card number
        $('#card_number').on('input', function() {
            let value = $(this).val().replace(/\s/g, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            $(this).val(formattedValue);
        });
        
        // Format expiry date
        $('#card_expiry').on('input', function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            $(this).val(value);
        });
        
        // Validate form before submission
        $('#checkout-form').submit(function(e) {
            if (!$('#terms').is(':checked')) {
                e.preventDefault();
                alert('Please agree to the Terms & Conditions');
                return false;
            }
        });
    });
</script>
@endpush