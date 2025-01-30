<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    //Sets what columns exist and can be edited.
    protected $primaryKey = "id";
    public $timestamps = false;
}
