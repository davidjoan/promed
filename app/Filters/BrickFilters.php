<?php 

namespace App\Filters;

use Illuminate\Http\Request;

class BrickFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function term($term = '')
    {
        return $this->builder->whereHas('district', function($q) use ($term) {
                $q->where('name','LIKE', '%'.$term.'%');
        });
    }

    public function geo_id($term = '')
    {
        return $this->builder->where('geo_id','=', $term);
    }
    
    public function district_id($term = '')
    {
        return $this->builder->where('district_id','=', $term);
    }

    public function user_id($term = '')
    {
        return $this->builder->whereIn('id', function($query) use ($term) {
            $query->select('brick_id')->from('brick_organization')
            ->leftJoin('organizations', function ($join) {
                $join->on('organizations.id', '=', 'brick_organization.organization_id');
            })->where('user_id', $term);
        });
    }
}