<?php

namespace Modules\Doctor\Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $this->call(DoctorTableSeeder::class);
         $this->call(SectionDoctorTableSeeder::class);
         $this->call(TimeDoctorTableSeeder::class);
    }
}
