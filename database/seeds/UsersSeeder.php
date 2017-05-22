<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id'        => 1,
             'type_user' => 'A',
             'state'     => '1',
             'email'     => 'admin@admin.com',
             'password'  => Hash::make('secret')],
        ];

        DB::table('users')->insert($users);
    }
}
