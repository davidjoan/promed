<?php

namespace App\Models;

use TarfinLabs\LaravelSpatial\Traits\HasSpatial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
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
        'first_date' => 'date',
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
}
