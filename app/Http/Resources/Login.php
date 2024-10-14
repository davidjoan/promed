<?php

namespace App\Http\Resources;

use App\Models\Campaign;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Campaign as ResourcesCampaign;

class Login extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['id' => $this->id, 
        'name' => $this->name, 
        'email' => $this->email, 
        'organizations' => Organization::collection($this->organizations),
        'campaigns' => ResourcesCampaign::collection(Campaign::limit(5)->get())];
    }
}
