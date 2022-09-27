<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('order_date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->date('deleted_at')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('buy_orders');
    }
}
