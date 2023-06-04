<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_from','time_to','room_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
