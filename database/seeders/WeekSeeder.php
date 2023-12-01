<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name'=>'Monday',
                'fullcalendar_day'=>1
            ],
            [
                'name'=>'Tuesday',
                'fullcalendar_day'=>2
            ],
            [
                'name'=>'Wednesday',
                'fullcalendar_day'=>3
            ],
            [
                'name'=>'Thursday',
                'fullcalendar_day'=>4
            ],
            [
                'name'=>'Friday',
                'fullcalendar_day'=>5
            ],
            [
                'name'=>'Soturday',
                'fullcalendar_day'=>6
            ],
            [
                'name'=>'Sonday',
                'fullcalendar_day'=>7
            ]
            ];

        DB::table('week')->insert($data);
    
    }
}
