<?php

use Illuminate\Database\Seeder;

class ContaminationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contamination_types = [
            ['id' => 1, 'description' => 'Deforestación'],
            ['id' => 2, 'description' => 'Desmonte'],
            ['id' => 3, 'description' => 'A. Verde maltratada'],
            ['id' => 4, 'description' => 'Pistas dañadas'],
            ['id' => 5, 'description' => 'Señalización'],
            ['id' => 6, 'description' => 'Cont. Visual'],
        ];

        DB::table('contamination_types')->insert($contamination_types);
    }
}
