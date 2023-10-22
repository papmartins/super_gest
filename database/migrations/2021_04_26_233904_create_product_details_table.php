<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('product_id'); // secundary key
            $table->float('length', 8, 2)->default(0.01);
            $table->float('height', 8, 2)->default(0.01);
            $table->float('width', 8, 2)->default(0.01);
            $table->timestamps();

            // constraint
            $table->foreign('product_id')->references('id')->on('products');
            // 1 to 1 relationship
            $table->unique('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
