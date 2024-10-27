<?php
namespace App\Models;

use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TarfinLabs\LaravelSpatial\Traits\HasSpatial;
use App\Models\dbTree\EloquentTreeItem;
use App\Models\Geo as ModelsGeo;
use App\Filters\Filterable;
use TarfinLabs\LaravelSpatial\Casts\LocationCast;
use Kalnoy\Nestedset\NodeTrait;

class Geo extends EloquentTreeItem
{
    use SoftDeletes, AuditableTrait, Filterable, HasSpatial, NodeTrait;
    
    protected $table = 'geo';
    const LEVEL_COUNTRY = 'PCLI';
    
    protected $casts = [
        'location' => LocationCast::class
    ];

        // get Country by country Code (eg US,GR)
        public static function getCountry($countryCode)
        {
            return self::level(self::LEVEL_COUNTRY)->country($countryCode)->first();
        }

        public function scopeCountry($query, $countryCode)
        {
            return $query->where('country', $countryCode);
        }
    
        public function scopeLevel($query, $level)
        {
            return $query->where('level', $level);
        }
    
}
