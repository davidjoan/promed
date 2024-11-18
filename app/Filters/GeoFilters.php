<?php

namespace App\Filters;

use Illuminate\Http\Request;

class GeoFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function term($term = '')
    {
        return $this->builder->where('name','LIKE', '%'.$term.'%');
    }

    public function level($level = '')
    {
        return $this->builder->where('level', $level);
    }

    public function active($active = '')
    {
        return $this->builder->where('active', $active);
    }
}