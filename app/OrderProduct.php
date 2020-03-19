<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function order()
    {
        return $this->belongsToMany('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
