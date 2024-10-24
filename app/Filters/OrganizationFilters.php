<?php

namespace App\Filters;

use Illuminate\Http\Request;

class OrganizationFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function user_id($id = '')
    {
        return $this->builder->where('user_id', $id);
    }
}