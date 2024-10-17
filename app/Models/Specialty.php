<?php
namespace App\Models;

use App\Models\Geo;
use App\Models\Client;

use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;

class Specialty extends Model
{
	use AuditableTrait, Filterable;
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

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}