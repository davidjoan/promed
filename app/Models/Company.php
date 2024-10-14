<?php
namespace App\Models;

use App\Models\Geo;
use App\Models\User;
use App\Models\Corporation;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    use AuditableTrait;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['corporation_id','code', 'name', 'description','closeup','ddd','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';
    
	public function geos()
    {
        return $this->belongsToMany(Geo::class);
    }

    public function corporation()
    {
        return $this->belongsTo(Corporation::class);
    }
    
	public function users()
    {
        return $this->hasMany(User::class);
    }
}
