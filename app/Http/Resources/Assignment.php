<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Assignment extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
//      'company' =>  Company::make($this->company),
//      'geo'     => Geo::make($this->geo),
//      'organization' => Organization::make($this->organization->get()->toTree()),
        'id' => $this->id,
        'company_id' =>  $this->company_id,
        'geo_id'     => $this->geo_id,
        'target' => Target::make($this->target),
        'category' => Category::make($this->category),
        'segment' => Segment::make($this->segment),
        'active' => $this->active,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at];
    }
}
