<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Province extends JsonResource
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
            'department' => Department::make($this->department_model),
            'code' => $this->code, 
            'name' => $this->name,
            'active' => $this->active];
    }
}
