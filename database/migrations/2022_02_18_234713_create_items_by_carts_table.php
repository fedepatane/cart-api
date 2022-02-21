<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsByCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_by_carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->biginteger('product_id')->unsigned(); 
            $table->biginteger('cart_id')->unsigned(); 
            $table->index('product_id');
            $table->index('cart_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->float('quantity');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_by_carts');
    }
}
