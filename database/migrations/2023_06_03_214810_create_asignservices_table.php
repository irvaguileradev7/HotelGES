<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignservices', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('service_id');
            $table->integer('total_services')->nullable();
            $table->timestamps();

            $table->foreign('guest_id')->references('id')->on('guests');
            $table->foreign('service_id')->references('id')->on('services');
        });     

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignservices');

    }

    public function update()
{
    $asignservices = DB::table('asignservices')->get();

    foreach ($asignservices as $asignservice) {
        $service = DB::table('services')->where('id', $asignservice->service_id)->first();
        $total = $asignservice->quantity * $service->price;

        DB::table('asignservices')->where('id', $asignservice->id)->update(['total_services' => $total]);
    }
}
};
