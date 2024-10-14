<?php

namespace App\Models;

use TarfinLabs\LaravelSpatial\Traits\HasSpatial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory, HasSpatial;

    protected $spatialFields = [
        'area'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_date'  => 'date',
    ];

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function department_model()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function province_model()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
