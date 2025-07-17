<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
            'can_make_entry' => $this->faker->boolean(),
            'can_generate_seals' => $this->faker->boolean(),
            'can_generate_letters' => $this->faker->boolean(),
        ];
    }

    public function admin(): static
    {
        return $this->state([
            'name' => 'Administrador',
            'can_make_entry' => true,
            'can_generate_seals' => true,
            'can_generate_letters' => true,
        ]);
    }

    public function user(): static
    {
        return $this->state([
            'name' => 'Usuario',
            'can_make_entry' => false,
            'can_generate_seals' => false,
            'can_generate_letters' => false,
        ]);
    }
}