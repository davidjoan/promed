<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TarfinLabs\LaravelSpatial\Casts\LocationCast;
use TarfinLabs\LaravelSpatial\Traits\HasSpatial;

class Department extends Model
{
    use HasFactory, HasSpatial;

    protected $fillable = [
        'id',
        'name',
        'address',
        'location',
    ];
    
    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }
}
