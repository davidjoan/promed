<?php
namespace App\Imports;

use App\Models\Geo;
use App\Models\Client;
use App\Models\Specialty;
use App\Models\ClientType;
use App\Models\University;
use App\Models\Tuition;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Client|null
    */
    public function model(array $row)
    {
        $geo         = Geo::getCountry('PE');
        $specialty   = Specialty::where('name', $row[2])->first();
        $client_type = ClientType::where('code', 'DO')->first();
        $tuition     = Tuition::where('description', $row[3])->first();
        $university  = University::where('code', 'UPCH')->first();
        $faker = \Faker\Factory::create('es_PE');
        $marital_status = array('Soltero','Casado','Viudo','Divorsiado');
        $name      = $faker->name;

        $dates    = array($faker->dateTime, $faker->dateTime, $faker->dateTime);
        usort($dates, array('App\Imports\ClientImport','compareByTimeStamp'));
     
        $client = Client::create(array(
            'geo_id' => $geo->id,
            'nationality_id' => $geo->id,
            'specialty_id' => $specialty->id,
            'client_type_id' => $client_type->id,
            'tuition_id' =>  $tuition->id,
            'university_id' => $university->id,
            'code' => $row[0],
            'name' => $name,
            'national_identity_type' => 'DNI', 
            'national_identity' => rand(45323478, 85332211),
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'mobile' => $faker->phoneNumber,
            'date_of_birth' => $dates[0],
            'date_of_graduation' => $dates[1],
            'date_of_aniversary' => $dates[2],
            'gender' => $row[5],
            'marital_status' => $marital_status[rand(0,3)], 
            'description' => $faker->text
        ));

        return $client;
    }

    function compareByTimeStamp($time1, $time2)
    {
        if ($time1 < $time2)
            return 1;
        else if ($time1 > $time2) 
            return -1;
        else
            return 0;
    }
}
