<?php

namespace App\Filters;

use Illuminate\Http\Request;

class TargetFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function institution_id($id = '')
    {
        return $this->builder->where('institution_id', $id);
    }
}