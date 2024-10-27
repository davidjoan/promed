<?php
namespace App\Models;

use App\Models\Geo;
use App\Models\Organization;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\Filterable;

class Brick extends Model
{
    use SoftDeletes;
    use AuditableTrait;
    use Filterable;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['geo_id','district_id','code', 'name', 'description','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function district()
    {
        return $this->belongsTo(Geo::class);
    }
}
