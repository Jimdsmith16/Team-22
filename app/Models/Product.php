<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Sets what columns exist and can be edited.
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'description',
        'alt_text',
        'number_of_stock',
        'image_link',
        'average_rating',
        'category_id'
    ];

    //Shows what baskets this product is in.
    public function baskets()
    {
        return $this->belongsToMany(Basket::class, 'basket_product')->withPivot('quantity');
    }

    //Shows what reviews this product has.
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function stockRequests()
    {
        return $this->hasMany(StockRequest::class);
    }

}
