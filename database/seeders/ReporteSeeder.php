<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reporte;
use App\Models\InventoryOutput;

class ReporteSeeder extends Seeder
{
    public function run(): void
    {
        $outputs = InventoryOutput::all();

        if ($outputs->isEmpty()) {
            $this->command->warn('No hay registros en InventoryOutput. Ejecuta InventoryOutputSeeder primero.');
            return;
        }

        foreach ($outputs as $output) {
            Reporte::create([
                'user_id' => $output->user_id,
                'departamento_id' => $output->departamento_id,
                'item_id' => $output->item_id,
                'cantidad' => $output->cantidad,
                'fecha' => $output->fecha_salida,
                'observaciones' => 'Entrega registrada en reporte de prueba.',
            ]);
        }
    }
}