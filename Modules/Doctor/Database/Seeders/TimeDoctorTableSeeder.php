<?php

namespace Modules\Doctor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Doctor\Entities\TimeDoctor;

class TimeDoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
//    'شنبه',
//                    'یکشنبه',
//                    'دوشنبه',
//                    'سه شنبه',
//                    'چهارشنبه',
//                    'پنج شنبه',
//                    'جمعه',
    public function run()
    {
        $times = [
            [
                'doctor_id'=>1,
                'day'=>'شنبه',
                'from'=>'10:00',
                'to'=>'14:00',
            ],
            [
                'doctor_id'=>1,
                'day'=>'شنبه',
                'from'=>'18:00',
                'to'=>'21:00',
            ],
            [
                'doctor_id'=>1,
                'day'=>'یکشنبه',
                'from'=>'10:00',
                'to'=>'14:00',
            ],
            [
                'doctor_id'=>1,
                'day'=>'یکشنبه',
                'from'=>'18:00',
                'to'=>'21:00',
            ],
            [
                'doctor_id'=>1,
                'day'=> 'دوشنبه',
                'from'=>'10:00',
                'to'=>'14:00',
            ],
            [
                'doctor_id'=>1,
                'day'=> 'دوشنبه',
                'from'=>'18:00',
                'to'=>'21:00',
            ],
            [
                'doctor_id'=>1,
                'day'=>'سه شنبه',
                'from'=>'15:30',
                'to'=>'22:30',
            ],
            [
                'doctor_id'=>1,
                'day'=>'چهارشنبه',
                'from'=>'08:00',
                'to'=>'13:30',
            ],

            [
                'doctor_id'=>2,
                'day'=>'شنبه',
                'from'=>'08:00',
                'to'=>'12:00',
            ],
            [
                'doctor_id'=>2,
                'day'=>'شنبه',
                'from'=>'21:00',
                'to'=>'23:00',
            ],
            [
                'doctor_id'=>2,
                'day'=>'یکشنبه',
                'from'=>'08:00',
                'to'=>'13:00',
            ],
            [
                'doctor_id'=>2,
                'day'=>'یکشنبه',
                'from'=>'22:00',
                'to'=>'00:00',
            ],
            [
                'doctor_id'=>2,
                'day'=> 'دوشنبه',
                'from'=>'08:00',
                'to'=>'11:30',
            ],
            [
                'doctor_id'=>2,
                'day'=> 'دوشنبه',
                'from'=>'18:00',
                'to'=>'23:00',
            ],
            [
                'doctor_id'=>2,
                'day'=>'سه شنبه',
                'from'=>'15:30',
                'to'=>'22:30',
            ],
            [
                'doctor_id'=>2,
                'day'=>'چهارشنبه',
                'from'=>'10:30',
                'to'=>'18:30',
            ],


            [
                'doctor_id'=>3,
                'day'=>'یکشنبه',
                'from'=>'08:00',
                'to'=>'15:30',
            ],
            [
                'doctor_id'=>3,
                'day'=> 'دوشنبه',
                'from'=>'18:00',
                'to'=>'23:00',
            ],
            [
                'doctor_id'=>3,
                'day'=>'سه شنبه',
                'from'=>'15:30',
                'to'=>'22:30',
            ],
            [
                'doctor_id'=>3,
                'day'=>'چهارشنبه',
                'from'=>'10:30',
                'to'=>'18:30',
            ],
            [
                'doctor_id'=>3,
                'day'=>'پنج شنبه',
                'from'=>'10:30',
                'to'=>'23:30',
            ],

        ];
        foreach ($times as $time){
            TimeDoctor::create($time);
        }
    }
}
