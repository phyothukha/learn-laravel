<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Post::factory()->create([
        //     "title" => "Hello Nay Kaung Lar",
        //     "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat voluptatum minima possimus porro vel placeat vitae maxime, voluptate quibusdam. Quam dignissimos dolor corrupti. Mollitia suscipit eos laboriosam ipsam tempora laudantium?"
        // ]);
        Post::factory()->count(50)->create();
    }
}
