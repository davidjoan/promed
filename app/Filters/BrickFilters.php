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
}