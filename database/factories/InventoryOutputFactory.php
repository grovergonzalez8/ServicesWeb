<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryOutputFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item_codigo' => \App\Models\Item::factory(),
            'cantidad' => $this->faker->numberBetween(1, 50),
            'user_ci' => \App\Models\User::factory(),
            'departamento_id' => \App\Models\Departamento::factory(),
            'fecha' => $this->faker->dateTimeThisYear(),
            'observacion' => $this->faker->sentence(),
        ];
    }

    public function forItem($item): static
    {
        return $this->state([
            'item_codigo' => $item instanceof \App\Models\Item ? $item->codigo : $item,
        ]);
    }

    public function toDepartamento($departamento): static
    {
        return $this->state([
            'departamento_id' => $departamento instanceof \App\Models\Departamento 
                ? $departamento->id 
                : $departamento,
        ]);
    }
}