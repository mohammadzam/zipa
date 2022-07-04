<?php

namespace Modules\Doctor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Doctor\Entities\SectionDoctor;

class SectionDoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section_doctors = [
            [
                'doctor_id'=>1,
                'section_id'=>1,

            ],
            [
                'doctor_id'=>2,
                'section_id'=>2,

            ],
            [
                'doctor_id'=>3,
                'section_id'=>3,

            ],


        ];
        foreach ($section_doctors as $section_doctor){
            SectionDoctor::create($section_doctor);
        }
    }
}
