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
}
