<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id'];

    public function products(){
        return $this->belongsToMAny('App\Models\Product','orders_products','order_id','product_id')->withPivot('id','created_at','updated_at','quantity');
    }
}
