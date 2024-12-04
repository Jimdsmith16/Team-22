<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'address_line1',
        'address_line2',
        'postcode',
        'country',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
