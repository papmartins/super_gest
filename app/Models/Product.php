<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['supplier_id','name','description','weight','unit_id'];

    // Acrescenta os valores da tabela relacionada 1 para 1
    public function productDetail(){
        return $this->hasOne('App\Models\ProductDetail');
    }
    
    public function supplier(){
        // $this->belongsTo( 'modelo', 'fk', 'pk')
        return $this->belongsTo('App\Models\Supplier', 'supplier_id', 'id');
    }

    
    public function orders(){
        // return $this->belongsToMAny('App\Produto','pedidos_produtos');
        return $this->belongsToMAny('App\Models\Order','orders_products','product_id','order_id');
    }
}
