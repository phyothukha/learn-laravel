<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(120)->create();

        // Post::factory()->create([
        //     "title" => "Hello Testing User",
        //     "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, dolore? Beatae ipsum similique debitis dolorum, perspiciatis natus veniam quia quo quam in veritatis blanditiis rerum aspernatur incidunt reiciendis perferendis? Aut."
        // ]);
        // Post::factory(50)->create();
    }
}
