<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->decimal('salary')->default(0.0)->nullable();
            $table->Integer('working_hours')->default(0)->nullable();
            $table->string('mobile')->nullable();
            $table->string('name_role')->default("undefine")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('type')->default(1);
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
