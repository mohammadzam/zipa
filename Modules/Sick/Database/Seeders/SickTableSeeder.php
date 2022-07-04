<?php

namespace Modules\Sick\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Sick\Entities\Sick;

class SickTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sicks = [
                [
                    'name'=>'Pory Khosravi',
                    'sick_number'=>'Sk00000001',
                    'password'=>Hash::make('password'),
                    'age'=>'23',
                    'sex'=>'male',
                    'role_id'=>3,
                ],
                [
                    'name'=>'Majid Tabrizy',
                    'sick_number'=>'Sk00000002',
                    'password'=>Hash::make('password'),
                    'age'=>'28',
                    'sex'=>'female',
                    'role_id'=>3,
                ],
                [
                    'name'=>'Mehsa Esfhany',
                    'sick_number'=>'Sk00000003',
                    'password'=>Hash::make('password'),
                    'age'=>'35',
                    'sex'=>'male',
                    'role_id'=>3,
                ],
        ];
        foreach ($sicks as $sick){
            Sick::create($sick);
        }
    }
}
