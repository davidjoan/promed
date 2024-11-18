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

    public function term($term = '')
    {
        return $this->builder->where('name','LIKE', '%'.$term.'%');
    }

    public function user_id($id = '')
    {
        return $this->builder->where('user_id', $id);
    }

    public function brick_id($term = '')
    {
        return $this->builder->whereHas('bricks', function ($query) use ($term){
            $query->where('brick_id',$term);
        });
    }

    public function specialty_id($term = '')
    {
        return $this->builder->whereHas('specialties', function ($query) use ($term){
            $query->where('specialty_id',$term);
        });
    }
}