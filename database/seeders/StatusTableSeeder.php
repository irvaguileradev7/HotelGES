<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status1 = new Status;
        $status1->status = 1;
        $status1->descrpition='Disponible';
        $status1->save();

        $status2 = new Status;
        $status2->status = 2;
        $status2->descrpition='Reservado';
        $status2->save();

        $status3 = new Status;
        $status3->status = 3;
        $status3->descrpition='Ocupado';
        $status3->save();

        $status4 = new Status;
        $status4->status = 4;
        $status4->descrpition='No disponible';
        $status4->save();
    }
}
