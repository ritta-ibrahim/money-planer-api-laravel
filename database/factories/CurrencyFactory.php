<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adminId = User::where('email','ritta.m.ibrahim@gmail.com')->first()->id;

        return [
            'name' => fake()->name(),
            'code' => fake()->name(),
            'exchange' => fake()->randomNumber(),
            'created_by' => $adminId,
            'updated_by' => $adminId,
        ];
    }
}
