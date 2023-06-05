<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('guest_id');
            $table->decimal('total_payment');
            $table->decimal('guest_payment');
            $table->decimal('difference');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('guest_id')->references('id')->on('guests');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
};
