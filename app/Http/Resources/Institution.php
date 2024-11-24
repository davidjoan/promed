<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Institution extends JsonResource
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
            'geo_id' => $this->geo_id,
            'institution_type' => InstitutionType::make($this->institution_type),
            'brick' => Brick::make($this->brick),
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'reference' => $this->reference,
            'location' => ($this->location)?$this->location->toArray():null,
            'contact_number' => $this->contact_number,
            'emergency' => $this->emergency,
            'ambulance' => $this->ambulance,
            'wheelchair' => $this->wheelchair,
            'dispensing' => $this->dispensing,
            'capacity_staff' => $this->capacity_staff,
            'website' => $this->website,
            'fanpage' => $this->fanpage,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'tiktok' => $this->tiktok,
            'active' => $this->active,
            'targets_qty' => $this->targets_qty()
        ];
    }
}