<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('storage');
            $table->string('adverse_effects');

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
        Schema::dropIfExists('medical_foods');
    }
}
