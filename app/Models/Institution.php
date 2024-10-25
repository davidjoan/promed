<?php

namespace App\Models;

use App\Models\Geo;
use App\Models\Brick;

use App\Models\InstitutionType;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TarfinLabs\LaravelSpatial\Traits\HasSpatial;
use TarfinLabs\LaravelSpatial\Casts\LocationCast;
use App\Filters\Filterable;

class Institution extends Model
{
    use SoftDeletes, AuditableTrait, Filterable, HasSpatial;


	/**
     * The attributes that are mass assignable.
     *
     * 
     * 
     * @var array
     */
    protected $fillable = ['geo_id','institution_type_id','brick_id','district_id','specialty_id', 'code','ruc', 'name', 'description','address','reference','latitude','longitude','position','location','active'];

	protected $dateFormat = 'Y-m-d H:i:s';

    protected $casts = [
        'location' => LocationCast::class
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function brick()
    {
        return $this->belongsTo(Brick::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function institution_type()
    {
        return $this->belongsTo(InstitutionType::class);
    }

    public function targets()
    {
        return $this->hasMany(Target::class);
    }

    public function district()
    {
        return $this->belongsTo(Geo::class);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->institution_type->name.' '.$this->name;
    }
}
