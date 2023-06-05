<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->text('detail');
            $table->decimal('price');
            $table->integer('capacity');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();

            $table->foreign('floor_id')->references('id')->on('floors');
            $table->foreign('type_id')->references('id')->on('types');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }

    public function after()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('floor_id')->references('id')->on('floors');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

};