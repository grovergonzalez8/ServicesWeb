<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        $departamentos = [
            "Direccion de Posgrado",
            "Secretaria Administrativa",
            "Secretaria Academica",
            "Desarrollo Tecnologico y Sistemas para la Educacion",
            "Coordinacion Academica",
            "Informatica",
            "Coordinacion Area Diplomados Doble Titulacion",
            "Soporte Academico y Caja Chica",
            "Recepcion e Informaciones",
            "Apoyo Logistico",
        ];

        foreach ($departamentos as $nombre) {
            DB::table('departamentos')->insert([
                'nombre' => $nombre,
                'descripcion' => 'Departamento de ' . $nombre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}