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
    
    protected $casts = [
        'location' => LocationCast::class
    ];
}
