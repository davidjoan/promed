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
            'district' => District::make($this->district),
            'brick' =>  Brick::make($this->brick),
            'code' => $this->code,
            'ruc' => $this->ruc,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'reference' => $this->reference,
            'location' => ($this->location)?$this->location->toArray():null,
            'active' => $this->active
        ];
    }
}