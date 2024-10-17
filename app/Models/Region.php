<?php
namespace App\Models;

use App\Models\Geo;

use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	use AuditableTrait;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['geo_id','code', 'name', 'description','active'];
	
    protected $dateFormat = 'Y-m-d H:i:s';
    
    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }
}
