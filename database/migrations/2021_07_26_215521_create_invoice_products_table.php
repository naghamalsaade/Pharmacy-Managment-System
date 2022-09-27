<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('invoice_id');

            $table->foreign('invoice_id')
                ->references('id')->on('invoices')
                ->onDelete('cascade');

            $table->unsignedBigInteger('bookIn_id');

            $table->foreign('bookIn_id')
                ->references('id')->on('books_in')
                ->onDelete('cascade');

            $table->decimal('discount_value')->default(0.00);
            $table->Integer('product_num')->default(0.00);
            $table->Integer('product_return')->default(0);
            $table->Integer('product_price')->default(0.00);
            $table->string('product_name');

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
        Schema::dropIfExists('invoice_products');
    }
}
