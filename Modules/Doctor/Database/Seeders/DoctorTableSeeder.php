<?php

namespace Modules\Doctor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Doctor\Entities\Doctor;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
                [
                    'name'=>'Moniry',
                    'doctor_number'=>'DR00000001',
                    'password'=>Hash::make('password'),
                    'role_id'=>2,
                ],
                [
                    'name'=>'Kobadi',
                    'doctor_number'=>'DR00000002',
                    'password'=>Hash::make('password'),
                    'role_id'=>2,
                ],
                [
                    'name'=>'Fallah',
                    'doctor_number'=>'DR00000003',
                    'password'=>Hash::make('password'),
                    'role_id'=>2,
                ],
        ];
        foreach ($doctors as $doctor){
            Doctor::create($doctor);
        }
    }
}
