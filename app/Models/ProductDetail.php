<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['product_id','weight','width','height','unit_id'];
    public function product(){
        return $this->belongsTo('App\Models\Produt');
    }
}
