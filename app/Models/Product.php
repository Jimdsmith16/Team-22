<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $timestamps = false;


    // baskets that contain the product
    public function baskets()
{
    return $this->belongsToMany(Basket::class, 'basket_product')
                ->withPivot('quantity');
}

}
