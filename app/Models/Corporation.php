<?php

namespace App\Models;

use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Corporation extends Model
{
    use HasFactory,SoftDeletes,AuditableTrait;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'description','active'];
	
	protected $dateFormat = 'Y-m-d H:i:s';
    
	public function geo()
    {
        return $this->belongsToMany(Geo::class);
    }
    
	public function users()
    {
        return $this->hasMany(User::class);
    }
}
