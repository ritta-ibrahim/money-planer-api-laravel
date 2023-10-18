<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Housing', 'Transportation', 'Food', 'Utilities', 'Clothing', 'Healthcare', 'Gifts', 'Personal', 'Debt', 'Retirement', 'Education', 'Savings', 'Entertainment',
        ];
        foreach ($categories as $category) {
            \App\Models\Category::factory()->create([
                'name' => $category,
            ]);
        }
    }
}
