<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrador',
                'description' => 'Acceso total al sistema',
                'can_make_entry' => true,
                'can_generate_seals' => true,
                'can_generate_letters' => true,
            ],
            [
                'name' => 'Operador de Almacén',
                'description' => 'Puede registrar entradas y salidas de inventario',
                'can_make_entry' => true,
                'can_generate_seals' => false,
                'can_generate_letters' => false,
            ],
            [
                'name' => 'Responsable de Departamento',
                'description' => 'Solo recibe productos y genera reportes',
                'can_make_entry' => false,
                'can_generate_seals' => false,
                'can_generate_letters' => false,
            ],
        ]);
    }
}