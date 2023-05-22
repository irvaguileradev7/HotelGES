<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = new Type;
        $type1->room_type = 'Habitación individual';
        $type1->save();

        $type2 = new Type;
        $type2->room_type = 'Habitación doble';
        $type2->save();

        $type3 = new Type;
        $type3->room_type = 'Habitación triple';
        $type3->save();

        $type4 = new Type;
        $type4->room_type = 'Habitación Queen size';
        $type4->save();

        $type5 = new Type;
        $type5->room_type = 'Habitación King size';
        $type5->save();

        $type6 = new Type;
        $type6->room_type = 'Suite de lujo';
        $type6->save();
    }
}
