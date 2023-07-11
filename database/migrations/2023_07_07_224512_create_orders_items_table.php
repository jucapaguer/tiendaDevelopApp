<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_orders');
            $table->foreign('id_orders')->references('id')->on('orders');
            
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');

            $table->integer('value');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_items');
    }
}
