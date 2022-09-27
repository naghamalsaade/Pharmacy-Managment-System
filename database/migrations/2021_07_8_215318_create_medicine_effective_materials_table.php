<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineEffectiveMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_effective_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedBigInteger('effective_material_id');

            $table->foreign('medicine_id')
                ->references('id')->on('medicines')
                ->onDelete('cascade');

            $table->foreign('effective_material_id')
                ->references('id')->on('effective_materials')
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
        Schema::dropIfExists('medicine_effective_materials');
    }
}

