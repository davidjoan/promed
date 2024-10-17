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
            'district' => District::make($this->district),
            'code' => $this->code, 
            'name' => $this->name, 
            'description' => $this->description,
            'location' => ($this->location)?$this->location->toArray():null,
            'active' => $this->active];
    }
}
