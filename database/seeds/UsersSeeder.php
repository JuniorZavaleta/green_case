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
            [
                'id'        => 1,
                'type_user' => '1',
                'state'     => '1',
                'email'     => 'admin@admin.com',
                'password'  => Hash::make('secret')
            ],
            [
                'id'        => 2,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'cercado@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 3,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'ancon@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 4,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'ate@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 5,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'barranco@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 6,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'brenia@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 7,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'carabayllo@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 8,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'comas@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 9,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'chaclacayo@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 10,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'chorrillos@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 11,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'elagustino@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 12,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'jesusmaria@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 13,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'lamolina@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 14,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'lavictoria@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 15,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'lince@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 16,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'lurigancho@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 17,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'lurin@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 18,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'magdalena@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 19,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'miraflores@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 20,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'pachacamac@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 21,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'pucusana@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 22,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'pueblolibre@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 23,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'puentepiedra@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 24,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'puntanegra@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 25,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'puntahermosa@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 26,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'rimac@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 27,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'sanbartolo@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 28,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'sanisidro@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 29,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'independencia@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 30,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'sjm@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 31,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'sanluis@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 32,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'smp@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 33,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'sanmiguel@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 34,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'surco@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 35,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'surquillo@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 36,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'vmt@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 37,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'sjl@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 38,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'smm@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 39,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'santarosa@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 40,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'losolivos@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 41,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'cieneguilla@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 42,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'sanborja@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 43,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'villasalvador@muni.com',
                'password'  => Hash::make('1234')
            ],
            [
                'id'        => 44,
                'type_user' => '2',
                'state'     => '1',
                'email'     => 'santaanita@muni.com',
                'password'  => Hash::make('1234')
            ],
        ];

        DB::table('users')->insert($users);
    }
}
