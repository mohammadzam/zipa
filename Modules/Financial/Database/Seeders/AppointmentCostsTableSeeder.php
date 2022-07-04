<?php

namespace Modules\Financial\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Financial\Entities\AppointmentCosts;

class AppointmentCostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'doctor_id'=>1,
                'price'=>'1500000',
            ],
            [
                'doctor_id'=>2,
                'price'=>'2000000',
            ],
            [
                'doctor_id'=>3,
                'price'=>'2500000',
            ],

        ];
        foreach ($data as $datum){
            AppointmentCosts::create($datum);
        }
    }
}
