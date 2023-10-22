<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsRelacionshipSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // mais passos para treinar
        Schema::table('products', function (Blueprint $table) {    
            // para que a criação da coluna supplier_id não dê error (por defeito os registos existentes irão ficar com o id 0)
            $supplier_id = DB::table('suppliers')->insertGetId([
                    'name' => 'Supplier Padrão',
                    'site' => 'fornecedorpadrao.pt',
                    'uf' => 'SP',
                    'email' => 'contact@fornecedorpadrao.pt'
            ]);
            
            $table->unsignedBigInteger('supplier_id')->default($supplier_id)->after('id');    
            $table->foreign('supplier_id')->references('id')->on('suppliers');        
        });

        // DB::statement('update site_contacts set contact_reason_id = contact_reason;'); // corre query na bd
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {    
              
            $table->dropForeign('products_supplier_id_foreign');    
            $table->dropColumn('supplier_id');    
                
        });
    }
}
