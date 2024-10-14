<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Schedule extends JsonResource
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
        'target_id' => $this->target_id,     
        'day' => $this->day,
        'start_time' => date('h:i a',strtotime($this->start_time)),
        'finish_time' => date('h:i a',strtotime($this->finish_time)),
        'description' => $this->description,
        'active' => $this->active];
    }
}
