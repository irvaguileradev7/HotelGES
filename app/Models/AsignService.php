<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignService extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity','guests_id','services_id','total_services'
    ];

    protected $table = 'asignservices';

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function guests()
    {
        return $this->belongsTo(Guest::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->total_services = $model->quantity * $model->service_id;
        });
    }

}
