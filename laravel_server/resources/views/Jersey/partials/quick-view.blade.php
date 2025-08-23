<div class="row">
    <div class="col-md-6">
        <img src="{{ $jersey->image_url }}" alt="{{ $jersey->name }}" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <h4>{{ $jersey->name }}</h4>
        <p class="text-muted mb-2">{{ $jersey->team }} • {{ $jersey->season }}</p>
        <p class="mb-3">{{ $jersey->description }}</p>
        
        <div class="mb-3">
            <span class="h4 text-danger">{{ $jersey->formatted_price }}</span>
            @if($jersey->stock_quantity > 0)
                <span class="badge bg-success ms-2">In Stock</span>
            @else
                <span class="badge bg-secondary ms-2">Out of Stock</span>
            @endif
        </div>
        
        @if($jersey->player_name)
            <p class="mb-2"><strong>Player:</strong> {{ $jersey->player_name }} 
                @if($jersey->player_number)
                    #{{ $jersey->player_number }}
                @endif
            </p>
        @endif
        
        <div class="d-flex gap-2">
            <a href="{{ route('jerseys.show', $jersey->id) }}" class="btn btn-danger">
                View Details
            </a>
            @if($jersey->stock_quantity > 0)
                <button class="btn btn-outline-danger add-to-cart-quick" data-id="{{ $jersey->id }}">
                    Add to Cart
                </button>
            @endif
        </div>
    </div>
</div>