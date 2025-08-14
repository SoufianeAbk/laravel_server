<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jersey extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team',
        'league',
        'season',
        'description',
        'price',
        'image_url',
        'player_name',
        'player_number',
        'type',
        'sizes',
        'stock_quantity',
        'is_featured',
        'is_active',
        'category_id'
    ];

    protected $casts = [
        'sizes' => 'array',
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Scopes - ✅ ALREADY PRESENT AND CORRECT
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByTeam($query, $team)
    {
        return $query->where('team', $team);
    }

    public function scopeByLeague($query, $league)
    {
        return $query->where('league', $league);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return '€' . number_format($this->price, 2);
    }

    public function getAvailableSizesAttribute()
    {
        return $this->sizes ?? ['S', 'M', 'L', 'XL', 'XXL'];
    }

    // Methods
    public function isInStock()
    {
        return $this->stock_quantity > 0;
    }

    public function decrementStock($quantity = 1)
    {
        $this->decrement('stock_quantity', $quantity);
    }

    public function incrementStock($quantity = 1)
    {
        $this->increment('stock_quantity', $quantity);
    }
}