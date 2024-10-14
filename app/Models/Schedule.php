<?php

namespace App\Models;

use App\Models\Geo;
use App\Models\Target;
use App\Models\Company;
use App\Filters\Filterable;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    use AuditableTrait;
    use Filterable;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id','geo_id','target_id', 'day', 'start_time','finish_time', 'description','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

	public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }    

    public function target()
    {
        return $this->belongsTo(Target::class);
    }
}
