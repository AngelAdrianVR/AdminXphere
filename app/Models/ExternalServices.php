<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'whatsapp',
        'description',
        'website',
        'social_networks',
        'sphere_id',
    ];

    protected $casts = [
        'social_networks' => 'array',
    ];

    //relationships
    public function sphere()
    {
        return $this->belongsTo(Sphere::class);
    }
}
