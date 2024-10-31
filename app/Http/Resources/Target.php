<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Target extends JsonResource
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
            'client' => Client::make($this->client),
            'institution' => Institution::make($this->institution),
            'job_position' => JobPosition::make($this->job_position),
            'specialty_target' => Specialty::make($this->specialty),
            'likes' => $this->likes(),
            'active' => $this->active
        ];
    }
}
