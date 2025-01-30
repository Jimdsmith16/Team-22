<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //Sets what columns exist and can be edited.
    public $timestamps = false;
    protected $fillable = [
        'address_line1',
        'address_line2',
        'postcode',
        'country',
    ];

    //Returns the user this address belongs to.
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
