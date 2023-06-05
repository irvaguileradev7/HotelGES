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
        // CALCULA EL TOTAL DEL COSTO DE LOS SERVICIOS SEGUN SU CANTIDAD
        DB::unprepared('
            CREATE TRIGGER calculate_total_services BEFORE INSERT ON asignservices FOR EACH ROW
            BEGIN
                DECLARE service_price DECIMAL(8, 2);
                SET service_price = (SELECT price FROM services WHERE id = NEW.service_id);
                SET NEW.total_services = NEW.quantity * service_price;
            END;
        ');

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS calculate_total_services');
    }
};
