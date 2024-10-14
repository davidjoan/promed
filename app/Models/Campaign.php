<?php

namespace App\Models;

use App\Models\Geo;
use App\Models\Company;
use App\Models\organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','geo_id','organization_id',
    'code', 'name','description','start','end','qty_days','qty_holidays','qty_real_days','status',
    'ready_mm_mp','locked_mm','locked_mp','active'];  
	
    protected $dateFormat = 'Y-m-d H:i:s';
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'date',
        'end' => 'date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function geo()
    {
        return $this->belongsTo(Geo::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
