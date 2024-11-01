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
        return $this->builder->where('name','LIKE', '%'.$term.'%')->orWhere('description','LIKE', '%'.$term.'%')->orWhere('closeup','LIKE', '%'.$term.'%')->orWhere('ddd','LIKE', '%'.$term.'%');
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