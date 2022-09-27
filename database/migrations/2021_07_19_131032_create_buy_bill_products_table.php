<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_bill_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buy_bill_id');
            $table->unsignedBigInteger('buy_product_id')->nullable();
            $table->date('production_date');
            $table->date('expired_date');
            $table->integer('quantity_recived');
            $table->integer('available_quantity');
            $table->integer('purchasing_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('reverse')->default(0);
            
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
        Schema::dropIfExists('buy_bill_products');
    }
}
