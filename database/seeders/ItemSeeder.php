<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['codigo' => 'P001', 'nombre' => 'Laptop HP', 'unidad_medida' => 'unidad', 'stock' => 10],
            ['codigo' => 'P002', 'nombre' => 'Proyector Epson', 'unidad_medida' => 'unidad', 'stock' => 5],
            ['codigo' => 'P003', 'nombre' => 'Silla ergonómica', 'unidad_medida' => 'unidad', 'stock' => 15],
            ['codigo' => 'P004', 'nombre' => 'Extensión eléctrica', 'unidad_medida' => 'unidad', 'stock' => 20],
            ['codigo' => 'P005', 'nombre' => 'Tóner HP 12A', 'unidad_medida' => 'unidad', 'stock' => 8],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}