<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['user_id', 'estimated_delivery_date', 'address_id'];

    protected $casts = [
        'estimated_delivery_date' => 'date',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity', 'price');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTotalAttribute()
    {
        return $this->products->sum(function ($product) {
            return $product->pivot->price * $product->pivot->quantity;
        });
    }
}
