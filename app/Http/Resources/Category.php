<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'qty_visits' => $this->qty_visits,
            'active' => $this->active];
    }
}
