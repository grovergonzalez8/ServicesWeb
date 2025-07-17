<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LetterNumberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_carta' => $this->faker->unique()->bothify('LTR-####-????'),
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