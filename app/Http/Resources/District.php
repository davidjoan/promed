<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class District extends JsonResource
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
            'province' => Province::make($this->province_model),
            'code' => $this->code, 
            'name' => $this->name,
            'area' => $this->area,
            'active' => $this->active];
    }
}
