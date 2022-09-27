<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReckonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reckons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('branch_id');
            
            $table->foreign('customer_id')
                 ->references('id')->on('customers')
                 ->onDelete('cascade');

            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('cascade');

            $table->boolean('b');
            $table->decimal('paid');

            $table->softDeletes();
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
        Schema::dropIfExists('reckons');

    }
}
