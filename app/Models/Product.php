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


    //Shows what baskets this product is in.
    public function baskets() {
        return $this->belongsToMany(Basket::class, 'basket_product')->withPivot('quantity');
    }

}
