<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_categories');
            $table->foreign('id_categories')->references('id')->on('categories');
            
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('statuses');
           
            $table->string("name", 250);
            $table->string("slug", 250);
            $table->text("picture");
            $table->text("short_description")->nullable();
            $table->text("description")->nullable();
            $table->bigInteger("inventory")->default(0);
            $table->integer("price");
            $table->integer("sale_price");
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
        Schema::dropIfExists('products');
    }
}
