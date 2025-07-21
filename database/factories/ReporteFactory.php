<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReporteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item_codigo' => \App\Models\Item::factory(),
            'user_ci' => \App\Models\User::factory(),
            'departamento_id' => \App\Models\Departamento::factory(),
            'titulo' => $this->faker->sentence(4),
            'contenido' => $this->faker->paragraphs(3, true),
            'tipo' => $this->faker->randomElement(['inventario', 'mantenimiento', 'general']),
            'observacion' => $this->faker->sentence(),
        ];
    }

    public function aboutItem($item): static
    {
        return $this->state([
            'item_codigo' => $item instanceof \App\Models\Item ? $item->codigo : $item,
        ]);
    }

    public function byUser($user): static
    {
        return $this->state([
            'user_ci' => $user instanceof \App\Models\User ? $user->ci : $user,
        ]);
    }
}