<?php

namespace App\Models;

use App\Models\Geo;
use App\Models\Target;
use App\Models\Segment;
use App\Models\Category;
use App\Models\Organization;
use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\Filterable;

class Assignment extends Model
{
    use SoftDeletes;
    use AuditableTrait;
    use Filterable;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['geo_id','organization_id','target_id','category_id','segment_id','mark','score','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    /**
     * Get the Target's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $fullname = $this->target->client->name.' ('.$this->id.')';
        return $fullname;
    }
}
