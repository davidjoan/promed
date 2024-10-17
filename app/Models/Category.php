<?php

namespace App\Models;

use App\Models\Geo;

use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\Filterable;

class Category extends Model
{
    use SoftDeletes, AuditableTrait, Filterable;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','geo_id', 'code', 'name', 'description','qty_visits','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }
}
