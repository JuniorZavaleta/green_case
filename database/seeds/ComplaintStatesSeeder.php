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
        $complaint_status = [
            [
                'id'          => 1,
                'name' => 'incompleto'
            ],
            [
                'id'          => 2,
                'name' => 'registrado'
            ],
            [
                'id'          => 3,
                'name' => 'aceptado'
            ],
            [
                'id'          => 4,
                'name' => 'rechazado'
            ],
            [
                'id'          => 5,
                'name' => 'en atención'
            ],
            [
                'id'          => 6,
                'name' => 'atendido'
            ],
        ];

        DB::table('complaint_status')->insert($complaint_status);
    }
}
