<?php 

namespace App\Filters;

use Illuminate\Http\Request;

class BrickFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function term($term = '')
    {
        return $this->builder->where('name','LIKE', '%'.$term.'%')->orWhere('description','LIKE', '%'.$term.'%')->orWhere('closeup','LIKE', '%'.$term.'%')->orWhere('ddd','LIKE', '%'.$term.'%');
    }

    public function organization_id($term = '')
    {
        return $this->builder->whereHas('organizations', function($q) use ($term) {
            $q->whereIn('organization_id', explode('|',$term));
        });
    }
}