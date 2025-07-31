<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SealNumberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_sello' => $this->faker->unique()->numberBetween(1303875, 9999999),
            'user_ci' => \App\Models\User::factory(),
            'observacion' => $this->faker->sentence(),
        ];
    }

    public function byUser($user): static
    {
        return $this->state([
            'user_ci' => $user instanceof \App\Models\User ? $user->ci : $user,
        ]);
    }
}