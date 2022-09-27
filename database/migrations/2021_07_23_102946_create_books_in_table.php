<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_in', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->Integer('quantity');
            $table->Integer('amount');
            $table->boolean('is_amount_notify')->default(0);
            $table->boolean('is_expired_notify')->default(0);
            $table->boolean('active')->default(1);;
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('buy_bill_product_id');
            $table->unsignedBigInteger('product_place_id');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_in');
    }
}
