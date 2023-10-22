<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdjustProductsBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branch', 30);
            $table->timestamps();                        
        });
        
        Schema::create('product_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('price', 8, 2)->default(0.01);
            $table->integer('stock_min')->default(1);
            $table->integer('stock_max')->default(1);
            $table->timestamps();
            
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('product_id')->references('id')->on('products');
                        
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price','stock_min','stock_max']);
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('stock_min')->default(1);
            $table->integer('stock_max')->default(1);
                        
        });
        // remover tabela
        Schema::dropIfExists('product_branches');
        Schema::dropIfExists('branches');
        //
    }
}
