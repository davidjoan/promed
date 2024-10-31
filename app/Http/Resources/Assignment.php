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
            'id' => $this->id,
            'geo_id' => $this->geo_id,
            'organization_id' => $this->organization_id,
            'target' => Target::make($this->target),
            'category' => Category::make($this->category),
            'segment' => Segment::make($this->segment),
            'like' => $this->like,
            'score' => $this->score,
            'active' => $this->active
        ];
    }
}
