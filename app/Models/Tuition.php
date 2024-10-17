<?php

namespace App\Models;

use App\Models\Geo;

use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\Filterable;

class Tuition extends Model
{
    use SoftDeletes, AuditableTrait, Filterable;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['geo_id', 'code', 'name', 'description','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }
}
