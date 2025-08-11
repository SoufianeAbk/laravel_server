<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'jersey_id',
        'size',
        'quantity',
        'price',
        'total'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'total' => 'decimal:2',
        'quantity' => 'integer'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function jersey()
    {
        return $this->belongsTo(Jersey::class);
    }

    public function getFormattedPriceAttribute()
    {
        return '€' . number_format($this->price, 2);
    }

    public function getFormattedTotalAttribute()
    {
        return '€' . number_format($this->total, 2);
    }
}