<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        //
        // $categories = ["IT News", "Food & Drinks", "Sport", "Travel", "Music"];
        // foreach ($categories as $category) {
        //     Category::factory()->create([
        //         "title" => $category,
        //         "slug" => Str::slug($category),
        //         "user_id" => rand()

        //     ]);
        // }
    }
}
