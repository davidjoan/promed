<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ClientTypeFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function geo_id($geo_id = '')
    {
        return $this->builder->where('geo_id', $geo_id);
    }

    public function term($term = '')
    {
        return $this->builder->where('name','LIKE', '%'.$term.'%')->orWhere('description','LIKE', '%'.$term.'%')->orWhere('code','LIKE', '%'.$term.'%');
    }

    public function active($active = '')
    {
        return $this->builder->where('active', $active);
    }
}