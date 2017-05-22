<?php

use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ['id' => 1, 'name' => 'Cercado'],
            ['id' => 2, 'name' => 'Ancón'],
            ['id' => 3, 'name' => 'Ate'],
            ['id' => 4, 'name' => 'Barranco'],
            ['id' => 5, 'name' => 'Breña'],
            ['id' => 6, 'name' => 'Carabayllo'],
            ['id' => 7, 'name' => 'Comas'],
            ['id' => 8, 'name' => 'Chaclacayo'],
            ['id' => 9, 'name' => 'Chorrillos'],
            ['id' => 10, 'name' => 'El Agustino'],
            ['id' => 11, 'name' => 'Jesús María'],
            ['id' => 12, 'name' => 'La Molina'],
            ['id' => 13, 'name' => 'La Victoria'],
            ['id' => 14, 'name' => 'Lince'],
            ['id' => 15, 'name' => 'Lurigancho'],
            ['id' => 16, 'name' => 'Lurin'],
            ['id' => 17, 'name' => 'Magdalena'],
            ['id' => 18, 'name' => 'Miraflores'],
            ['id' => 19, 'name' => 'Pachacamac'],
            ['id' => 20, 'name' => 'Pucusana'],
            ['id' => 21, 'name' => 'Pueblo Libre'],
            ['id' => 22, 'name' => 'Puente Piedra'],
            ['id' => 23, 'name' => 'Punta Negra'],
            ['id' => 24, 'name' => 'Punta Hermosa'],
            ['id' => 25, 'name' => 'Rimac'],
            ['id' => 26, 'name' => 'San Bartolo'],
            ['id' => 27, 'name' => 'San Isidro'],
            ['id' => 28, 'name' => 'Independencia'],
            ['id' => 29, 'name' => 'San Juan de Miraflores'],
            ['id' => 30, 'name' => 'San Luis'],
            ['id' => 31, 'name' => 'San Martin de Porres'],
            ['id' => 32, 'name' => 'San Miguel'],
            ['id' => 33, 'name' => 'Santiago de Surco'],
            ['id' => 34, 'name' => 'Surquillo'],
            ['id' => 35, 'name' => 'Villa María del Triunfo'],
            ['id' => 36, 'name' => 'San Juan de Lurigancho'],
            ['id' => 37, 'name' => 'Santa María del Mar'],
            ['id' => 38, 'name' => 'Santa Rosa'],
            ['id' => 39, 'name' => 'Los Olivos'],
            ['id' => 40, 'name' => 'Cieneguilla'],
            ['id' => 41, 'name' => 'San Borja'],
            ['id' => 42, 'name' => 'Villa el Salvador'],
            ['id' => 43, 'name' => 'Santa Anita'],
        ];

        DB::table('districts')->insert($districts);
    }
}
