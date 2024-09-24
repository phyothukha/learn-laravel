<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $count = $this->command->ask("how many create user?", 10);
        User::factory($count)->create();
        User::factory()->create([
            "name" => "Phyo Thu Kha",
            "email" => "ptk@gmail.com",
            "password" => Hash::make("asdffdsa")
        ]);



        $categories = ["IT News", "Food & Drinks", "Sport", "Travel", "Music"];
        foreach ($categories as $category) {
            Category::factory()->create([
                "title" => $category,
                "slug" => Str::slug($category),
                "user_id" => User::inRandomOrder()->first()->id
            ]);
        }
        Post::factory(250)->create();
    }
}
