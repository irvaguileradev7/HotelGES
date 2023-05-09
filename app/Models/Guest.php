<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','last_name',
        'email','phone','adults','kids','room_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
