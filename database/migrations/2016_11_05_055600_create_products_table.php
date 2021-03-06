<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('description');
            $table->string('category');
            $table->float('price');
            $table->integer('stock');
            $table->string('unit');
            $table->integer('total_purchased')->default(0);
            $table->string('featured')->default('product.jpg');
            $table->string('image1')->default('product.jpg');
            $table->string('image2')->default('product.jpg');
            $table->string('image3')->default('product.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
 string
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
