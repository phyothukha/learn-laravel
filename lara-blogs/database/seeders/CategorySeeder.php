<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["IT News", "Food & Drinks", "Sport", "Travel", "Music"];
        foreach ($categories as $category) {
            Category::factory()->create([
                "title" => $category,
                "slug" => Str::slug($category),
                "user_id" => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
