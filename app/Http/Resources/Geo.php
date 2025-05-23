<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Geo extends JsonResource
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
        'name' => $this->name, 
        'level' => $this->level,
        'country' => $this->country,
        'population' => $this->population,
        'location' => ($this->location)?$this->location->toArray():null,
        'timezone' => $this->timezone,
        'parent' => Geo::make($this->parent)
    ];
    }
}
