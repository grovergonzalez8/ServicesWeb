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
                'user_ci' => $output->user_ci,             // Cambiar user_id por user_ci
                'departamento_id' => $output->departamento_id,
                'item_codigo' => $output->item_codigo,     // Cambiar item_id por item_codigo
                'titulo' => 'Reporte de entrega',          // Agrega un título válido (obligatorio)
                'contenido' => 'Entrega registrada en reporte de prueba.', // Agrega contenido (obligatorio)
                'tipo' => 'inventario',                     // Opcional, según migración
                'fecha' => $output->fecha,                  // Usa fecha correcta, en la migración está 'fecha'
                'observacion' => null,                      // O algún texto, opcional
            ]);
        }
    }
}