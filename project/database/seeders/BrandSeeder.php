<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('brands')->insert(
            [
                [
                    'name' => 'Chevrolet',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Volkswagen',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Fiat',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Renault',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Ford',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Toyota',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Hyundai',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Jeep',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Honda',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Nissan',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Citroën',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Mitsubishi',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Peugeot',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Chery',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'BMW',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Mercedes-Benz',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Kia',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Audi',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Volvo',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Land Rover',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]
        );
    }
}
