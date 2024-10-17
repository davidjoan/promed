<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Brick extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'geo' => Geo::make($this->geo),
            'region' => Region::make($this->region),
            'district' => District::make($this->district),
            'code' => $this->code, 
            'name' => $this->name, 
            'description' => $this->description,
            'active' => $this->active];
    }
}
