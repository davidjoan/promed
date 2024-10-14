<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
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
        'client_type' =>  ClientType::make($this->client_type),
        'tuition' =>  Tuition::make($this->tuition),
        'nationality' =>  Geo::make($this->nationality),
        'specialty_base' =>  Specialty::make($this->specialty),
        'university' => University::make($this->university),
        'code' => $this->code,
        'name' => $this->name,
        'firstname' => $this->firstname,
        'lastname' => $this->lastname,
        'national_identity' => $this->national_identity,
        'email' => $this->email,
        'phone' => $this->phone,
        'mobile' => $this->mobile,
        'date_of_birth' => date('d/m/Y',strtotime($this->date_of_birth)),
        'date_of_graduation' => date('d/m/Y',strtotime($this->date_of_graduation)),
        'date_of_aniversary' => date('d/m/Y',strtotime($this->date_of_aniversary)),
        'gender' => $this->gender,
        'marital_status' => $this->marital_status,
        'description' => $this->description,
        'active' => $this->active,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at];
    }
}
