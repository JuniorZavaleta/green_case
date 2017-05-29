<?php

use Illuminate\Database\Seeder;

class ComplaintStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $complaint_states = [
            [
                'id'          => 1,
                'description' => 'incompleto'
            ],
            [
                'id'          => 2,
                'description' => 'registrado'
            ],
            [
                'id'          => 3,
                'description' => 'aceptado'
            ],
            [
                'id'          => 4,
                'description' => 'rechazado'
            ],
            [
                'id'          => 5,
                'description' => 'en atención'
            ],
            [
                'id'          => 6,
                'description' => 'atendido'
            ],
        ];

        DB::table('complaint_states')->insert($complaint_states);
    }
}
