<?php

namespace Modules\Section\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Section\Entities\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'name'=>'جراحی بینی',
            ],
            [
                'name'=>'جراحی سینه',
            ],
            [
                'name'=>'جراحی شکم',
            ],
            [
                'name'=>'تزریق ژل',
            ],

        ];
        foreach ($sections as $section) {
            Section::create($section);
        }

    }
}
