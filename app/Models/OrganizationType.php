<?php
namespace App\Models;

use App\Models\Geo;
use App\Models\Company;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;

class OrganizationType extends Model
{
	use AuditableTrait;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id','code', 'name', 'description','active'];  
	
	protected $dateFormat = 'Y-m-d H:i:s';

	
    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
           
}
