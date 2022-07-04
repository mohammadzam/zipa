<?php

namespace Modules\Sick\Database\Seeders;

use Illuminate\Database\Seeder;

class SickDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $this->call(SickTableSeeder::class);
         $this->call(MedicalInformationTableSeeder::class);
         $this->call(TimeSickTableSeeder::class);
    }
}
