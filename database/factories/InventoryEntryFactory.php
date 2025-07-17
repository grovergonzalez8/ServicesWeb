<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryEntryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item_codigo' => \App\Models\Item::factory(),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'user_ci' => \App\Models\User::factory(),
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

    public function byUser($user): static
    {
        return $this->state([
            'user_ci' => $user instanceof \App\Models\User ? $user->ci : $user,
        ]);
    }
}