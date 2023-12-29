<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoorders', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('amount', 10, 2);
            $table->integer('period');
            $table->time('time');
            $table->decimal('quantity', 10, 2);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autoorders');
    }
}
