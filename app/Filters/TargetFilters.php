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

    public function term($term = '')
    {
        return $this->builder->whereHas('client', function ($q) use ($term){
                $q->where('name','LIKE', '%'.$term.'%');
            })->orWhereHas('institution', function ($q) use ($term){
                $q->where('name','LIKE', '%'.$term.'%');
            });
    }

    public function organization_id($term = '')
    {
        return $this->builder->whereNotIn('id', function($query) use ($term) {
            $query->select('target_id')->from('assignments')->where('organization_id', $term);
        })->whereHas('client', function ($query) use ($term){
            $query->whereIn('specialty_id', function($query) use ($term) {
                $query->select('specialty_id')->from('organization_specialty')->where('organization_id', $term);
            });
        })->whereHas('institution', function ($query) use ($term){
            $query->whereIn('brick_id', function($query) use ($term) {
                $query->select('brick_id')->from('brick_organization')->where('organization_id', $term);
            });
        });
    }

    public function active($active = '')
    {
        return $this->builder->where('active', $active);
    }
        
    public function institution_id($term = '')
    {
        return $this->builder->where('institution_id', $term);
    }
}