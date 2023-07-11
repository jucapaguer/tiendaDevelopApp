<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('statuses');
            
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            
            $table->unsignedBigInteger('id_billing');
            $table->foreign('id_billing')->references('id')->on('user_addresses');
            
            $table->unsignedBigInteger('id_shipping');
            $table->foreign('id_shipping')->references('id')->on('user_addresses');
 
            $table->string('note', 500)->nullable();
            $table->integer('sub_total');
            
            $table->unsignedBigInteger('id_coupon')->nullable();
            $table->foreign('id_coupon')->references('id')->on('coupons');
            
            $table->integer('discount')->nullable();
            $table->integer('envio');
            $table->integer('total');
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
        Schema::dropIfExists('orders');
    }
}
