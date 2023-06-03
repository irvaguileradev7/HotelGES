<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'check_int','check_out','persons'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
