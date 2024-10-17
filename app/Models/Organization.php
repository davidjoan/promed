<?php
namespace App\Models;

use App\Models\Geo;
use App\Models\User;
use App\Models\Brick;

use App\Models\Specialty;
use App\Models\OrganizationType;

use Kalnoy\Nestedset\NodeTrait;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;

class Organization extends Model
{
  use NodeTrait, AuditableTrait,Filterable;
  
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','user_id','geo_id','organization_type_id','code', 'name', 'description','active','parent_id'];  

	protected $dateFormat = 'Y-m-d H:i:s';
	
    public function bricks()
    {
        return $this->belongsToMany(Brick::class);
    }
    
    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class);
    }

    public function organization_type()
    {
        return $this->belongsTo(OrganizationType::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
