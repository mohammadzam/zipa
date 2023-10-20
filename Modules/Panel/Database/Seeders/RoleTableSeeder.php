<?php

namespace Modules\Panel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Panel\Entities\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'=>'administrator',
            ],
            [
                'name'=>'doctor',
            ],
            [
                'name'=>'sick',
            ],

        ];
        foreach ($roles as $role){
            Role::create($role);
        }
    }

//DB_CONNECTION=sqlsrv
//DB_HOST=127.0.0.1
//DB_PORT=1433
//DB_DATABASE=zipa
//DB_USERNAME= root
//DB_PASSWORD=


/**
php artisan module:migrate Panel
php artisan module:seed Panel

php artisan module:migrate Admin
php artisan module:seed Admin

php artisan module:migrate Section
php artisan module:seed Section


php artisan module:migrate Doctor
php artisan module:seed Doctor

php artisan module:migrate Financial
php artisan module:seed Financial


php artisan module:migrate Sick
php artisan module:seed Sick

**/
}
