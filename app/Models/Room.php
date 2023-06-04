<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'detail', 'price','capacity','floor_id', 'type_id', 'status_id','image'
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
