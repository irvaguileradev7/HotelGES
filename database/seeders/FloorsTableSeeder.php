<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Floor;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floor1 = new Floor;
        $floor1->number_floor = '1';
        $floor1->save();

        $floor2 = new Floor;
        $floor2->number_floor = '2';
        $floor2->save();

        $floor3 = new Floor;
        $floor3->number_floor = '3';
        $floor3->save();

        $floor4 = new Floor;
        $floor4->number_floor = '4';
        $floor4->save();

        $floor5 = new Floor;
        $floor5->number_floor = '5';
        $floor5->save();
    }
}
