<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Sports Equipment',
            'Laboratory Equipment',
            'Office Equipment',
            'Audio Visual Equipment',
            'Power Tools',
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category,
            ]);
        }
    }
}
