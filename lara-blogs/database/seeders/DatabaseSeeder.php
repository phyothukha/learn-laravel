<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//            NationSeeder::class,
//            UserSeeder::class,
//            CategorySeeder::class,
            PostSeeder::class,
        ]);

//        $photo=Storage::allFiles();
//        array_shift($photo);
//        Storage::delete($photo);
//
//
//        echo "\e[96m Storage cleaning \n";
    }
}
