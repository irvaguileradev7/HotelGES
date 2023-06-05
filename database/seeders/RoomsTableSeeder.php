<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room1 = new Room;
        $room1->number = 101;
        $room1->detail = 'Habitacion sencilla para dos personas';
        $room1->capacity = 2;
        $room1->price = 988;
        $room1->image = null;
        $room1->floor_id = 1;
        $room1->type_id = 1;
        $room1->status_id = 1;
        $room1->save();

        $room2 = new Room;
        $room2->number = 102;
        $room2->detail = 'Habitacion sencilla para dos personas';
        $room2->capacity = 2;
        $room2->price = 988;
        $room2->image = null;
        $room2->floor_id = 1;
        $room2->type_id = 1;
        $room2->status_id = 1;
        $room2->save();

        $room3 = new Room;
        $room3->number = 103;
        $room3->detail = 'Habitacion sencilla para dos personas';
        $room3->capacity = 2;
        $room3->price = 988;
        $room3->image = null;
        $room3->floor_id = 1;
        $room3->type_id = 1;
        $room3->status_id = 1;
        $room3->save();

        $room4 = new Room;
        $room4->number = 104;
        $room4->detail = 'Habitacion sencilla para dos personas';
        $room4->capacity = 2;
        $room4->price = 988;
        $room4->image = null;
        $room4->floor_id = 1;
        $room4->type_id = 1;
        $room4->status_id = 1;
        $room4->save();
        
        $room5 = new Room;
        $room5->number = 105;
        $room5->detail = 'Habitacion sencilla para dos personas';
        $room5->capacity = 2;
        $room5->price = 988;
        $room5->image = null;
        $room5->floor_id = 1;
        $room5->type_id = 1;
        $room5->status_id = 1;
        $room5->save();
    }
}
