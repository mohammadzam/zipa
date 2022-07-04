<?php

namespace Modules\Sick\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Sick\Entities\MedicalInformation;

class MedicalInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informations = [
            [
                'sick_id'=>1,
                'section_id'=>1,
                'doctor_id'=>1,

                'disease'=>'تحریف دید',
                'treatment'=>'انجام جراحی اصلاح بینایی با لیزر',
            ],
            [
                'sick_id'=>2,
                'section_id'=>2,
                'doctor_id'=>2,

                'disease'=>'اندازه سینه کوچک',
                'treatment'=>'بزرگ كردن سینه',
            ],
            [
                'sick_id'=>3,
                'section_id'=>3,
                'doctor_id'=>3,
                'disease'=>'چربی زيادى شکم',
                'treatment'=>'لیپوساکشن و برداشتن چربی شکم',
            ],

        ];
        foreach ($informations as $information){
            MedicalInformation::create($information);
        }
    }
}
