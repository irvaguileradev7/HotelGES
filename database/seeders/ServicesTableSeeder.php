<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serv1 = new Service;
        $serv1->type = 'Desayuno a la habitacion';
        $serv1->details = 'Desayuno tipo continental';
        $serv1->price = 80;
        $serv1->save();

        $serv2 = new Service;
        $serv2->type = 'Estacionamiento';
        $serv2->details = 'Estacionamiento disponible para vehiculos personales';
        $serv2->price = 45;
        $serv2->save();

        $serv3 = new Service;
        $serv3->type = 'Internet Wi-Fi';
        $serv3->details = 'Internet inalambrico de 2.5 Ghz';
        $serv3->price = 0;
        $serv3->save();

        $serv4 = new Service;
        $serv4->type = 'Lavanderia';
        $serv4->details = 'Servicio de lavaderia para los huespedes';
        $serv4->price = 30;
        $serv4->save();

        $serv5 = new Service;
        $serv5->type = 'Aire acondicionado';
        $serv5->details = 'Aire acondicionado tipo mini-split con termostato incluido';
        $serv5->price = 50;
        $serv5->save();
    }
}
