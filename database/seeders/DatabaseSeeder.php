<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear roles primero
        $this->call(RoleSeeder::class);
        
        // 2. Crear usuarios (incluye admin)
        $this->call(UserSeeder::class);
        
        // 3. Crear departamentos
        $this->call(DepartamentoSeeder::class);
        
        // 4. Crear items de inventario
        $this->call(ItemSeeder::class);
        
        // 5. Crear movimientos de inventario
        $this->call(InventoryOutputSeeder::class);
        
        // 6. Crear sellos y cartas
        $this->call(DocumentSeeder::class);
        
        // 7. Crear reportes
        $this->call(ReporteSeeder::class);
    }
}