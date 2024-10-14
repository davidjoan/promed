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
            'company_id' => $this->company_id,
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
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'active' => $this->active
        ];
    }
}
