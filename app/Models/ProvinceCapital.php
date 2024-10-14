<?php

namespace App\Models;

use TarfinLabs\LaravelSpatial\Traits\HasSpatial;
use TarfinLabs\LaravelSpatial\Casts\LocationCast;
use Illuminate\Database\Eloquent\Model;

class ProvinceCapital extends Model
{
    use HasSpatial;

    protected $fillable = [
        'id',
        'geo_id',
        'province_id',
        'department_id',
        'capital',
        'district',
        'province',
        'department',
        'classification',
        'category',
        'location',
        'active'
    ];
 
    protected $casts = [
        'location' => LocationCast::class
    ];
}
