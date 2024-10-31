<?php

namespace App\Filters;

use Illuminate\Http\Request;

class AssignmentFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function term($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('client', function ($q) use ($term){
                $q->where('name','LIKE', '%'.$term.'%');
            })->orWhereHas('institution', function ($q) use ($term){
                $q->where('name','LIKE', '%'.$term.'%');
            });
        });
    }

    public function organization_id($term = '')
    {
        return $this->builder->where('organization_id', '=', $term);
    }

    public function category_id($term = '')
    {
        return $this->builder->where('category_id', '=', $term);
    }

    public function segment_id($term = '')
    {
        return $this->builder->where('segment_id', '=', $term);
    }

    public function institution_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->where('institution_id','=', $term);
        });
    }
    
    public function geo_id($geo_id = '')
    {
        return $this->builder->where('geo_id', $geo_id);
    }
}