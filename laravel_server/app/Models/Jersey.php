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
        'stock_quantity',
        'is_featured',
        'is_active',
        'category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'stock_quantity' => 'integer',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Accessor for formatted price
    public function getFormattedPriceAttribute()
    {
        return '€' . number_format($this->price, 2);
    }

    // Accessor for available sizes
    public function getAvailableSizesAttribute()
    {
        return ['S', 'M', 'L', 'XL', 'XXL'];
    }

    // Scope for active jerseys
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for featured jerseys
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for in stock jerseys
    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    // Scope for specific league
    public function scopeByLeague($query, $league)
    {
        return $query->where('league', $league);
    }

    // Scope for specific team
    public function scopeByTeam($query, $team)
    {
        return $query->where('team', $team);
    }

    // Scope for specific type
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Decrease stock quantity by specified amount
     */
    public function decrementStock($quantity)
    {
        if ($this->stock_quantity >= $quantity) {
            $this->decrement('stock_quantity', $quantity);
            return true;
        }
        return false;
    }

    /**
     * Increase stock quantity by specified amount
     */
    public function incrementStock($quantity)
    {
        $this->increment('stock_quantity', $quantity);
        return true;
    }

    /**
     * Check if jersey is in stock
     */
    public function isInStock($quantity = 1)
    {
        return $this->stock_quantity >= $quantity;
    }
}