<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignService extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity','guests_id','services_id'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function guests()
    {
        return $this->belongsTo(Guest::class);
    }

}
