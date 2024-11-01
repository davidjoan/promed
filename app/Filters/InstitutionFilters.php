<?php

namespace App\Filters;

use Illuminate\Http\Request;
use TarfinLabs\LaravelSpatial\Types\Point;

class InstitutionFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function near($term = '')
    {
        $params=explode(',',$term);
        return $this->builder->withinDistanceTo('location', new Point(lat: $params[0], lng: $params[1]), $params[2]);
    }

    public function term($term = '')
    {
        return $this->builder->where('name','LIKE', '%'.$term.'%')->orWhere('code','LIKE', '%'.$term.'%')->orWhere('ruc','LIKE', '%'.$term.'%')->orWhere('address','LIKE', '%'.$term.'%');
    }

    public function institution_type_id($term = '')
    {
        return $this->builder->where('institution_type_id', $term);
    }

    public function brick_id($term = '')
    {
        return $this->builder->where('brick_id', $term);
          
    }
}