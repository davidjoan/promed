<?php

namespace App\Filters;

use Illuminate\Http\Request;

class OrganizationTypeFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function term($term = '')
    {
        return $this->builder->where('name','LIKE', '%'.$term.'%')->orWhere('description','LIKE', '%'.$term.'%');
    }

    public function active($active = '')
    {
        return $this->builder->where('active', $active);
    }
}