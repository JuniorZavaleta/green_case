<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CommunicationTypesSeeder::class);
        $this->call(ContaminationTypesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(AuthoritiesSeeder::class);
        $this->call(ComplaintStatesSeeder::class);
    }
}
