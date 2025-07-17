<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'ci' => $this->faker->unique()->numberBetween(1000000, 9999999),
            'nombre' => $this->faker->name(),
            'password' => Hash::make('password'),
            'role_id' => \App\Models\Role::factory(),
        ];
    }

    public function admin(): static
    {
        return $this->state([
            'ci' => 12345678,
            'nombre' => 'Administrador',
            'role_id' => \App\Models\Role::factory()->admin(),
        ]);
    }

    public function withRole($role): static
    {
        return $this->state([
            'role_id' => $role instanceof \App\Models\Role 
                ? $role->id 
                : \App\Models\Role::factory()->create(['name' => $role])->id,
        ]);
    }
}