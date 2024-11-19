<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $timestamps = false;

    // fillable field - can update as needed
    protected $fillable = ['user_id', 'estimated_delivery_date'];
}
