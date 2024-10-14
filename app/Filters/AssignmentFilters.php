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

    public function terms($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('client', function ($q) use ($term){
                $q->where('name','LIKE', '%'.$term.'%');
                $q->orWhere('code','LIKE', '%'.$term.'%');
            })->orWhereHas('institution', function ($q) use ($term){
                $q->where('name','LIKE', '%'.$term.'%');
                $q->orWhere('code','LIKE', '%'.$term.'%');
                $q->orWhere('ruc','LIKE', '%'.$term.'%');
                $q->orWhere('address','LIKE', '%'.$term.'%');
            });
        });
    }

    public function organization_id($term = '')
    {
        return $this->builder->where('organization_id', '=', $term);
    }

    public function category_id($term = '')
    {
        return $this->builder->whereHas('category', function($q) use ($term) {
            $q->whereIn('id', explode('|',$term));
        });
    }

    public function segment_id($term = '')
    {
        return $this->builder->whereHas('segment', function($q) use ($term) {
            $q->whereIn('id', explode('|',$term));
        });
    }

    public function institution_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereIn('institution_id', explode('|',$term));
        });
    }

    public function job_position_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereIn('job_position_id', explode('|',$term));
        });
    }

    public function specialty_target_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereIn('specialty_id', explode('|',$term));
        });
    }

    public function client_type_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('client', function ($q) use ($term){
                $q->whereIn('client_type_id', explode('|',$term));
            });
        });
    }

    public function tuition_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('client', function ($q) use ($term){
                $q->whereIn('tuition_id', explode('|',$term));
            });
        });
    }

    public function nationality_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('client', function ($q) use ($term){
                $q->whereIn('nationality_id', explode('|',$term));
            });
        });
    }

    public function specialty_base_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('client', function ($q) use ($term){
                $q->whereIn('specialty_id', explode('|',$term));
            });
        });
    }

    public function university_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('client', function ($q) use ($term){
                $q->whereIn('university_id', explode('|',$term));
            });
        });
    }

    public function institution_type_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('institution', function ($q) use ($term){
                $q->whereIn('institution_type_id', explode('|',$term));
            });
        });
    }

    public function brick_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('institution', function ($q) use ($term){
                $q->whereIn('brick_id', explode('|',$term));
            });
        });
    }

    public function geo_id($term = '')
    {
        return $this->builder->whereHas('target', function($q) use ($term) {
            $q->whereHas('institution', function ($q) use ($term){
                $q->whereHas('brick', function ($q) use ($term){
                    $q->whereIn('geo_id', explode('|',$term));
                });
            });
        });
    }
}