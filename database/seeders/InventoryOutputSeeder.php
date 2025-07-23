<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InventoryOutput;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class InventoryOutputSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $departamentos = Departamento::all();
        $items = Item::all();

        if ($users->isEmpty() || $departamentos->isEmpty() || $items->isEmpty()) {
            $this->command->warn('Asegúrate de tener usuarios, departamentos e ítems creados.');
            return;
        }

        foreach (range(1, 5) as $i) {
            $user = $users->random();
            $item = $items->random();

            InventoryOutput::create([
                'user_ci' => $user->ci,
                'departamento_id' => $departamentos->random()->id,
                'item_codigo' => $item->codigo,
                'cantidad' => rand(1, 10),
                'fecha' => now()->subDays(rand(1, 10)),
                'observacion' => 'Observación generada automáticamente',
            ]);
        }
    }
}