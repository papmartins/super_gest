<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


// SoftDeletes é incluido pelo metodo de trates permitem herança horizontal ( multiplos extends que não são permitidos)
class Supplier extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','site','email','uf'];
    
    // lazy loading (padrão) - Só depois de chamer esta função o product fica com os detalhes
    // para eager loading ProductDetailController com with (edit)
    // products porque é N para 1
    public function products(){
        // $this->hasMany( 'modelo', 'fk', 'pk')
        return $this->hasMany('App\Models\Product', 'supplier_id', 'id');
    }
}
