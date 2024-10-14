<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ScheduleFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function target_id($id = '')
    {
        return $this->builder->where('target_id', $id);
    }
}