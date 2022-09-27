<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespoiledProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despoiled_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('book_in_id');
            $table->Integer('despoiled_amount');
            $table->Date('expired_date');
            $table->boolean('is_destroyed')->default(0);
            $table->boolean('is_retrieved')->default(0);
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
        Schema::dropIfExists('despoiled_products');
    }
}
