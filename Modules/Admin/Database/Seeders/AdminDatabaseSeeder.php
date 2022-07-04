<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name'=>'Mohammad Zam',
                'administrative_number'=>'AD0000001',
                'password'=>Hash::make('password'),
                'role_id'=>1,
            ],
            [
                'name'=>'Soro Iskandary',
                'administrative_number'=>'AD0000002',
                'password'=>Hash::make('password'),
                'role_id'=>1,
            ],
            [
                'name'=>'Amir AghaRahimy',
                'administrative_number'=>'AD0000003',
                'password'=>Hash::make('password'),
                'role_id'=>1,
            ],
            [
                'name'=>'Ali Reza Maliky',
                'administrative_number'=>'AD'.rand(0,9999999),
                'password'=>Hash::make('password'),
                'role_id'=>1,
            ],


        ];
        foreach ($admins as $admin){
            Admin::create($admin);
        }
    }
}
