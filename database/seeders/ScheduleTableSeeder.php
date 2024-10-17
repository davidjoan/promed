<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Geo;
use App\Models\User;
use App\Models\Target;
use App\Models\Schedule;


use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->delete();

        $targets = Target::all();
        $days = ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado','domingo'];

        foreach($targets as $target){

            foreach($days as $day){

                $time = $this->getStartTime();

                Schedule::create(array('geo_id' => $target->geo_id,
                'target_id' => $target->id,
                'day' => $day,
                'start_time' => $time,
                'finish_time' => date("H:i:s", strtotime($time)+(60*240)),  //+4Hotas
                'description' => null,
                'active' => 1));
            }
        }
    }

    public function getStartTime()
    {
        $min = strtotime(date('Y-m-d 08:00:00'));
        $max = strtotime(date("Y-m-d 12:00:00"));

        $val = rand($min, $max);

        return date('H:i:s', $val);
    }
}
