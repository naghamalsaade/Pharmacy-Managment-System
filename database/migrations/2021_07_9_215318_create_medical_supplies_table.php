<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('use_to');
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

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
        Schema::dropIfExists('medical_supplies');
    }
}
