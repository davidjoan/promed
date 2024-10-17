<?php

namespace App\Models;

use TarfinLabs\LaravelSpatial\Traits\HasSpatial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TarfinLabs\LaravelSpatial\Casts\LocationCast;
use App\Filters\Filterable;

class District extends Model
{
    use HasFactory, HasSpatial, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['geo_id', 'province_id', 'department_id', 'code', 'name', 'province', 'department', 'capital', 'ha', 'last_doc', 'last_law', 'last_date', 'shape_length', 'shape_area', 'shape_length_1', 'shape_area_1', 'location', 'active'];

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $casts = [
        'location' => LocationCast::class
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
