<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    
    //Sets what columns exist and can be edited.
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['user_id'];

    //Shows the products in the basket.
    public function products() {
        return $this->belongsToMany(Product::class, 'basket_product')->withPivot('quantity');
    }
}
