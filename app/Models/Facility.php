<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Facility extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'is_active',
        'location',
        'description',
        'capacity',
        'cost',
        'hours_available',
        'sphere_id',  
    ];
    
    //relationships
    public function sphere()
    {
        return $this->belongsTo(Sphere::class);
    }

    public function reservations()
    {
        return $this->hasMany(ReservationFacility::class);
    }
}
