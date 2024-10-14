<?php

namespace App\Models;

use App\Models\Geo;
use App\Models\Company;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes;
    use AuditableTrait;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id','geo_id', 'code', 'name', 'description','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

	public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }
}
