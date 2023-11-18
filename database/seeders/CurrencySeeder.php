<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                "name" => "Dollar",
                "code" => "USD",
                "exchange" => 1,
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::factory()->create($currency);
        }
    }
}
