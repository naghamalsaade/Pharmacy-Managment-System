<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buy_order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('quantity_order');
            $table->date('deleted_at')->nullable();
            
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
        Schema::dropIfExists('buy_products');
    }
}
