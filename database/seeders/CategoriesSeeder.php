<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sneakers',
                'slug' => Str::slug('Sneakers'),
                'icon' => 'sneakers-icon.png',
            ],
            [
                'name' => 'Boots',
                'slug' => Str::slug('Boots'),
                'icon' => 'boots-icon.png',
            ],
            [
                'name' => 'Sandals',
                'slug' => Str::slug('Sandals'),
                'icon' => 'sandals-icon.png',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'icon' => $category['icon'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
