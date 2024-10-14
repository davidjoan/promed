<?php

namespace App\Filters;

use Illuminate\Http\Request;

class InstitutionFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function terms($term = '')
    {
        return $this->builder->where('name','LIKE', '%'.$term.'%')->orWhere('code','LIKE', '%'.$term.'%')->orWhere('ruc','LIKE', '%'.$term.'%')->orWhere('address','LIKE', '%'.$term.'%');
    }

    public function organization_id($term = '')
    {
        return $this->builder->whereHas('targets', function ($q) use ($term){
            $q->whereHas('assignments', function ($q) use ($term){
                $q->whereIn('organization_id', explode('|',$term));
            });
        });

        return $this->builder->where('organization_id', '=', $term);
    }

    public function institution_id($term = '')
    {
        return $this->builder->whereIn('id', explode('|',$term));
    }

    public function institution_type_id($term = '')
    {
        return $this->builder->whereIn('institution_type_id', explode('|',$term));
    }

    public function brick_id($term = '')
    {
        return $this->builder->whereIn('brick_id', explode('|',$term));
          
    }

    public function geo_id($term = '')
    {
        return $this->builder->whereHas('brick', function ($q) use ($term){
                    $q->whereIn('geo_id', explode('|',$term));
                });
    }
}