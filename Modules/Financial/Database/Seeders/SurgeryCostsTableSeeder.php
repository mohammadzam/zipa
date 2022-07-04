<?php

namespace Modules\Financial\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Financial\Entities\SurgeryCosts;

class SurgeryCostsTableSeeder extends Seeder
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
                'section_id'=>1,
                'price'=>'100000000',
            ],
             [
                'section_id'=>2,
                'price'=>'300000000',
            ],
             [
                'section_id'=>3,
                'price'=>'250000000',
            ],
            [
                'section_id'=>4,
                'price'=>'80000000',
            ],

        ];
        foreach ($data as $datum){
            SurgeryCosts::create($datum);
        }
    }
}
