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

    protected $dates = ['time_from','time_to'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    protected static function boot()
{
    parent::boot();

    static::creating(function ($reservation) {
        $reservation->nights = $reservation->time_from->diffInDays($reservation->time_to);
    });
}
}
