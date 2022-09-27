<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ir_ips', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('ip_id');

            $table->foreign('ip_id')
                ->references('id')->on('invoice_products')
                ->onDelete('cascade');

           $table->unsignedBigInteger('ri_id');

            $table->foreign('ri_id')
                ->references('id')->on('return_invoices')
                ->onDelete('cascade');

            $table->Integer('num_pr');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('ir_ips');
    }
}
