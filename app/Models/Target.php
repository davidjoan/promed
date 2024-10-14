<?php

namespace App\Models;

use App\Models\Geo;
use App\Models\Client;
use App\Models\Company;
use App\Models\Institution;
use App\Models\Specialty;
use App\Models\JobPosition;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Target extends Model
{
    use SoftDeletes;
    use AuditableTrait;
	/**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['company_id','geo_id','client_id','institution_id','job_position_id','specialty_id',
    'qty_patiences','avg_price_inquiry','social_level_patients','attends_child','attends_teen',
    'attends_adult', 'attends_old:','attends_online', 'attends_face_to_face', 'active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

	public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function job_position()
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get the Target's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $fullname = $this->client->name.' ('.$this->institution->id.')';
        return $fullname;
    }
}
