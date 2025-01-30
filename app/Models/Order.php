<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    //Sets what columns exist and can be edited.
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['user_id', 'estimated_delivery_date','shipping_address'];
}
