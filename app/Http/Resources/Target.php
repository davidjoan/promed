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
            'geo_id' => $this->geo_id,
            'client' => Client::make($this->client),
            'institution' => Institution::make($this->institution),
            'job_position' => JobPosition::make($this->job_position),
            'specialty_target' => Specialty::make($this->specialty),
            'qty_patiences' => $this->qty_patiences, 
            'avg_price_inquiry'=> $this->avg_price_inquiry, 
            'social_level_patients'=> $this->social_level_patients, 
            'attends_child'=> $this->attends_child,
            'attends_teen'=> $this->attends_teen, 
            'attends_adult'=> $this->attends_adult, 
            'attends_old'=> $this->attends_old, 
            'attends_online'=> $this->attends_online, 
            'attends_face_to_face'=> $this->attends_face_to_face,
            'active' => $this->active,
            'likes' => $this->likes(),//count not part of record
        ];
    }
}
