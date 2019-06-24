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
            $table->string('product_name');
            $table->integer('cat_id');
            $table->integer('sup_id');
            $table->string('product_code');
            $table->string('product_garage');
            $table->string('product_route');
            $table->string('product_image');
            $table->string('product_buy_date');
            $table->string('product_expire_date');
            $table->float('buying_price');
            $table->float('selling_price');
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
