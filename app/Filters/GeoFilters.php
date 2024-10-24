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

    public function level($id = '')
    {
        return $this->builder->where('level', $id);
    }
}