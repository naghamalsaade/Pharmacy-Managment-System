<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('recieve_date');
            $table->unsignedBigInteger('buy_order_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('total_price')->nullable();
            $table->integer('total_payment')->nullable();
            
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
        Schema::dropIfExists('buy_bills');
    }
}
