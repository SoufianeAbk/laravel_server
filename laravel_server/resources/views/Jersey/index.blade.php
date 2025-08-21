@extends('layouts.app')

@section('title', 'All Jerseys - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3">
            <div class="filter-sidebar bg-white rounded p-4 mb-4">
                <h4 class="mb-4">Filters</h4>
                
                <form method="GET" action="{{ route('jerseys.index') }}" id="filter-form">
                    <!-- Category Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="filter-title mb-3">Category</h6>
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" 
                                       value="{{ $category->id }}" id="cat-{{ $category->id }}"
                                       {{ request('category') == $category->id ? 'checked' : '' }}>
                                <label class="form-check-label" for="cat-{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- League Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="filter-title mb-3">League</h6>
                        <select class="form-select" name="league">
                            <option value="">All Leagues</option>
                            @foreach($leagues as $league)
                                <option value="{{ $league }}" {{ request('league') == $league ? 'selected' : '' }}>
                                    {{ $league }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Team Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="filter-title mb-3">Team</h6>
                        <select class="form-select" name="team">
                            <option value="">All Teams</option>
                            @foreach($teams as $team)
                                <option value="{{ $team }}" {{ request('team') == $team ? 'selected' : '' }}>
                                    {{ $team }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Type Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="filter-title mb-3">Jersey Type</h6>
                        <select class="form-select" name="type">
                            <option value="">All Types</option>
                            <option value="home" {{ request('type') == 'home' ? 'selected' : '' }}>Home</option>
                            <option value="away" {{ request('type') == 'away' ? 'selected' : '' }}>Away</option>
                            <option value="third" {{ request('type') == 'third' ? 'selected' : '' }}>Third</option>
                            <option value="goalkeeper" {{ request('type') == 'goalkeeper' ? 'selected' : '' }}>Goalkeeper</option>
                        </select>
                    </div>
                    
                    <!-- Price Range -->
                    <div class="filter-group mb-4">
                        <h6 class="filter-title mb-3">Price Range</h6>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="number" class="form-control" name="min_price" 
                                       placeholder="Min" value="{{ request('min_price') }}">
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" name="max_price" 
                                       placeholder="Max" value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-danger w-100 mb-2">Apply Filters</button>
                    <a href="{{ route('jerseys.index') }}" class="btn btn-outline-secondary w-100">Clear All</a>
                </form>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="col-lg-9">
            <!-- Header -->
            <div class="products-header bg-white rounded p-3 mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0">All Jerseys</h4>
                        <p class="text-muted mb-0">{{ $jerseys->total() }} products found</p>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end align-items-center">
                            <label class="me-2 text-nowrap">Sort by:</label>
                            <select class="form-select w-auto" id="sort-select">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name: A-Z</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="row g-4">
                @forelse($jerseys as $jersey)
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card h-100">
                            <div class="product-image-wrapper position-relative">
                                <a href="{{ route('jerseys.show', $jersey->id) }}">
                                    @php
                                        // Generate fallback image based on team and league
                                        $fallbackImage = '';
                                        $league = strtolower(str_replace(' ', '-', $jersey->league));
                                        $team = strtolower(str_replace([' ', '.'], ['-', ''], $jersey->team));
                                        $type = strtolower($jersey->type);
                                        
                                        // Map team names to image files
                                        $teamImageMap = [
                                            'manchester-united' => 'manchester-united-home-2024.jpg',
                                            'manchester-city' => 'manchester-city-third-2024.jpg',
                                            'arsenal' => 'arsenal-home-2024.jpg',
                                            'chelsea' => 'chelsea-home-2024.jpg',
                                            'liverpool' => 'liverpool-away-2024.jpg',
                                            'real-madrid' => 'real-madrid-home-2024.jpg',
                                            'fc-barcelona' => 'barcelona-home-2024.jpg',
                                            'barcelona' => 'barcelona-home-2024.jpg',
                                            'atletico-madrid' => 'atletico-madrid-away-2024.jpg',
                                            'sevilla-fc' => 'sevilla-home-2024.jpg',
                                            'sevilla' => 'sevilla-home-2024.jpg',
                                            'juventus' => 'juventus-home-2024.jpg',
                                            'ac-milan' => 'ac-milan-home-2024.jpg',
                                            'inter-milan' => 'inter-milan-home-2024.jpg',
                                            'ssc-napoli' => 'napoli-home-2024.jpg',
                                            'napoli' => 'napoli-home-2024.jpg',
                                            'bayern-munich' => 'bayern-munich-home-2024.jpg',
                                            'borussia-dortmund' => 'borussia-dortmund-home-2024.jpg',
                                            'rb-leipzig' => 'rb-leipzig-home-2024.jpg',
                                            'bayer-leverkusen' => 'bayer-leverkusen-home-2024.jpg',
                                            'paris-saint-germain' => 'psg-home-2024.jpg',
                                            'psg' => 'psg-home-2024.jpg',
                                            'olympique-marseille' => 'marseille-home-2024.jpg',
                                            'marseille' => 'marseille-home-2024.jpg',
                                            'olympique-lyon' => 'lyon-home-2024.jpg',
                                            'lyon' => 'lyon-home-2024.jpg',
                                            'as-monaco' => 'monaco-home-2024.jpg',
                                            'monaco' => 'monaco-home-2024.jpg',
                                        ];
                                        
                                        // League folder mapping
                                        $leagueMap = [
                                            'premier-league' => 'premier-league',
                                            'la-liga' => 'la-liga',
                                            'serie-a' => 'serie-a',
                                            'bundesliga' => 'bundesliga',
                                            'ligue-1' => 'ligue-1',
                                        ];
                                        
                                        if (isset($teamImageMap[$team]) && isset($leagueMap[$league])) {
                                            $fallbackImage = "images/jerseys/{$leagueMap[$league]}/{$teamImageMap[$team]}";
                                        }
                                        
                                        // Use database image if available, otherwise use fallback
                                        $imageUrl = $jersey->image_url && !str_contains($jersey->image_url, 'placeholder') 
                                                   ? $jersey->image_url 
                                                   : ($fallbackImage ? asset($fallbackImage) : asset('images/default-jersey.jpg'));
                                    @endphp
                                    
                                    <img src="{{ $imageUrl }}" 
                                         alt="{{ $jersey->name }}" 
                                         class="product-image w-100"
                                         onerror="this.src='{{ asset('images/default-jersey.jpg') }}'">
                                </a>
                                @if($jersey->is_featured)
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">Featured</span>
                                @endif
                                @if($jersey->stock_quantity < 5 && $jersey->stock_quantity > 0)
                                    <span class="badge bg-warning position-absolute top-0 end-0 m-2">Low Stock</span>
                                @elseif($jersey->stock_quantity == 0)
                                    <span class="badge bg-secondary position-absolute top-0 end-0 m-2">Out of Stock</span>
                                @endif
                                <div class="product-overlay">
                                    <button class="btn btn-light btn-sm quick-view" data-id="{{ $jersey->id }}">
                                        <i class="fas fa-eye"></i> Quick View
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">
                                    <a href="{{ route('jerseys.show', $jersey->id) }}">{{ $jersey->name }}</a>
                                </h5>
                                <p class="product-details mb-2">
                                    <span class="text-muted">{{ $jersey->team }}</span> • 
                                    <span class="text-muted">{{ $jersey->season }}</span>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="product-price">{{ $jersey->formatted_price }}</span>
                                    <div class="btn-group" role="group">
                                        @auth
                                            <button class="btn btn-outline-danger btn-sm wishlist-btn" 
                                                    data-id="{{ $jersey->id }}" title="Add to Wishlist">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        @endauth
                                        <button class="btn btn-danger btn-sm add-to-cart-quick" 
                                                data-id="{{ $jersey->id }}" 
                                                {{ $jersey->stock_quantity == 0 ? 'disabled' : '' }}>
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <h5>No jerseys found</h5>
                            <p>Try adjusting your filters or <a href="{{ route('jerseys.index') }}">browse all jerseys</a></p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-5">
                {{ $jerseys->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quick View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="quickViewContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal (for size selection) -->
<div class="modal fade" id="addToCartModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cart-jersey-id">
                <div class="size-selector">
                    <label class="form-label">Choose your size:</label>
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" name="size" id="size-s" value="S">
                        <label class="btn btn-outline-dark" for="size-s">S</label>
                        
                        <input type="radio" class="btn-check" name="size" id="size-m" value="M">
                        <label class="btn btn-outline-dark" for="size-m">M</label>
                        
                        <input type="radio" class="btn-check" name="size" id="size-l" value="L" checked>
                        <label class="btn btn-outline-dark" for="size-l">L</label>
                        
                        <input type="radio" class="btn-check" name="size" id="size-xl" value="XL">
                        <label class="btn btn-outline-dark" for="size-xl">XL</label>
                        
                        <input type="radio" class="btn-check" name="size" id="size-xxl" value="XXL">
                        <label class="btn btn-outline-dark" for="size-xxl">XXL</label>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="cart-quantity" value="1" min="1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-add-to-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .filter-sidebar {
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: sticky;
        top: 90px;
    }
    
    .filter-title {
        font-weight: 600;
        color: var(--primary-color);
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
        overflow: hidden;
        height: 350px;
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
    
    .product-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.8);
        transform: translateY(100%);
        transition: transform 0.3s;
        padding: 10px;
        text-align: center;
    }
    
    .product-card:hover .product-overlay {
        transform: translateY(0);
    }
    
    .product-info {
        padding: 15px;
    }
    
    .product-title a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }
    
    .product-title a:hover {
        color: var(--accent-color);
    }
    
    .product-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--accent-color);
    }
    
    .wishlist-btn.active i {
        color: var(--accent-color);
        font-weight: 900;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Sort change
        $('#sort-select').on('change', function() {
            const url = new URL(window.location.href);
            url.searchParams.set('sort', $(this).val());
            window.location.href = url.toString();
        });
        
        // Quick view
        $('.quick-view').on('click', function() {
            const jerseyId = $(this).data('id');
            $.get(`/jerseys/${jerseyId}/quick-view`, function(response) {
                $('#quickViewContent').html(response.html);
                $('#quickViewModal').modal('show');
            });
        });
        
        // Add to cart quick
        $('.add-to-cart-quick').on('click', function() {
            const jerseyId = $(this).data('id');
            $('#cart-jersey-id').val(jerseyId);
            $('#addToCartModal').modal('show');
        });
        
        // Confirm add to cart
        $('#confirm-add-to-cart').on('click', function() {
            const jerseyId = $('#cart-jersey-id').val();
            const size = $('input[name="size"]:checked').val();
            const quantity = $('#cart-quantity').val();
            
            $.ajax({
                url: '{{ route("cart.add") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    jersey_id: jerseyId,
                    size: size,
                    quantity: quantity
                },
                success: function(response) {
                    $('#addToCartModal').modal('hide');
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
        $('.wishlist-btn').on('click', function() {
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
</script>
@endpush