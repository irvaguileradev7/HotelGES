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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('adults');
            $table->integer('kids')->nullable();
            $table->unsignedBigInteger('room_id');
            $table->timestamps();

            
            $table->foreign('room_id')->references('id')->on('rooms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }

    public function after()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms');
        });

    }
    
};
