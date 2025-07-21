<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // 1. Usuario Admin fijo
        DB::table('users')->insert([
            'ci' => 12345678,
            'nombre' => 'Admin Principal',
            'password' => bcrypt('admin123'),
            'role_id' => 1, // ID del rol 'Administrador'
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Dos usuarios aleatorios
        foreach (range(1, 2) as $i) {
            DB::table('users')->insert([
                'ci' => $faker->unique()->numberBetween(10000001, 99999999),
                'nombre' => $faker->name,
                'password' => bcrypt('password'),
                'role_id' => $faker->numberBetween(2, 3),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}