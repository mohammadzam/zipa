<?php

namespace Modules\Sick\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Sick\Entities\TimeSick;

class TimeSickTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = [
            [
                'sick_id' =>1,
                'doctor_id'=>1,
                'date'=>'2022-06-18',
                'from'=>'11:00',
                'to'=>'11:30',
            ],
            [
                'sick_id' =>2,
                'doctor_id'=>2,
                'date'=>'2022-06-18',
                'from'=>'09:30',
                'to'=>'10:30',
            ],
            [
                'sick_id' =>3,
                'doctor_id'=>3,
                'date'=>'2022-06-19',
                'from'=>'14:00',
                'to'=>'15:30',
            ],

        ];
        foreach ($times as $time){
            TimeSick::create($time);
        }
    }
}
