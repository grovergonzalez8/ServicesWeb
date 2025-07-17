<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->bothify('ITM-####'),
            'nombre_item' => $this->faker->words(3, true),
            'stock' => $this->faker->numberBetween(0, 100),
            'unidad' => $this->faker->randomElement(['unidad', 'kg', 'litro', 'metro']),
        ];
    }

    public function withStock(int $quantity): static
    {
        return $this->state([
            'stock' => $quantity,
        ]);
    }
}