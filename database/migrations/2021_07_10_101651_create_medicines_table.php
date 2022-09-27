<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('generic_name');
            $table->string('medicine_name');
            $table->string('alternative_medicine');
            $table->string('caliber');
            $table->string('composition');
            $table->string('indications');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('age_group_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('product_id')
              ->references('id')->on('products')
              ->onDelete('cascade');

            $table->foreign('type_id')
              ->references('id')->on('types')
              ->onDelete('cascade');

            $table->foreign('age_group_id')
              ->references('id')->on('age_groups')
              ->onDelete('cascade');

            $table->foreign('category_id')
              ->references('id')->on('categories')
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
        Schema::dropIfExists('medicines');
    }
}
