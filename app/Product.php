<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orderProducts()
    {
        return $this->hasOne('App\OrderProduct');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
}
