<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Organization extends JsonResource
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
            'organization_type' => OrganizationType::make($this->organization_type),
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'selected' => $this->selected,
            'active' => $this->active,
            'bricks' => Brick::collection($this->bricks),
            'regions' => Region::collection($this->regions),
            'specialties' => Specialty::collection($this->specialties),];
    }
}
