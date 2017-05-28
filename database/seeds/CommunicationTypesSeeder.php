<?php

use Illuminate\Database\Seeder;

class CommunicationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communication_types = [
            ['id' => 1, 'description' => 'Messenger'],
            ['id' => 2, 'description' => 'Telegram'],
            ['id' => 3, 'description' => 'Email'],
        ];

        DB::table('communication_types')->insert($communication_types);
    }
}
