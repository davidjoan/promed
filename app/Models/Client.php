<?php

namespace App\Models;

use App\Models\Geo;
use App\Models\Company;
use App\Models\Tuition;
use App\Models\Specialty;
use App\Models\ClientType;
use App\Models\University;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use SoftDeletes;
    use AuditableTrait;
    use Notifiable;

	/**
     * The attributes that are mass assignable.
     *           
     *
     * @var array
     */
    protected $fillable = ['company_id','geo_id','client_type_id','tuition_id','nationality_id',
    'specialty_id','university_id', 'code','name', 'firstname','lastname','photo','national_identity',
    'email','password','phone','mobile','date_of_birth','date_of_graduation','date_of_aniversary','gender',
    'marital_status', 'description','is_alive','active','created_at','updated_at','deleted_at'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_graduation' => 'date',
        'date_of_aniversary' => 'date',
    ];

	public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function client_type()
    {
        return $this->belongsTo(ClientType::class);
    }

    public function tuition()
    {
        return $this->belongsTo(Tuition::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Geo::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function targets()
    {
        return $this->hasMany(Target::class);
    }

    /**
     * Get the Clien's name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;

    }
}
