<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InventoryOutput;
use App\Models\User;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;

class InventoryOutputSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de tener usuarios, departamentos e items con ID 1 al 5
        $users = User::all();
        $departamentos = Departamento::all();

        if ($users->isEmpty() || $departamentos->isEmpty()) {
            $this->command->warn('No hay usuarios o departamentos disponibles. Ejecuta UserSeeder y DepartamentoSeeder primero.');
            return;
        }

        foreach (range(1, 5) as $i) {
            InventoryOutput::create([
                'user_id' => $users->random()->id,
                'departamento_id' => $departamentos->random()->id,
                'item_id' => $i, // suplantamos con item_id manualmente 1-5
                'cantidad' => rand(1, 10),
                'fecha_salida' => now()->subDays(rand(1, 10)),
            ]);
        }
    }
}