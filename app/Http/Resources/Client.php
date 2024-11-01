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
        'geo_id' => $this->geo_id,
        'client_type' => ClientType::make($this->client_type),
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
        'date_of_birth' => $this->date_of_birth,
        'date_of_graduation' => $this->date_of_graduation,
        'date_of_aniversary' => $this->date_of_aniversary,
        'gender' => $this->gender,
        'marital_status' => $this->marital_status,
        'description' => $this->description,
        'active' => $this->active,
        'specialties' => Specialty::collection($this->specialties),
        'hobbies' => Hobby::collection($this->hobbies)];
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->header('Accept', 'application/json');
        $response->header('Content-Type', 'application/json;charset=UTF-8');
        $response->header('Charset', 'utf-8');
    }
}
