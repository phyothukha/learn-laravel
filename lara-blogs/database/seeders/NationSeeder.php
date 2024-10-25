<?php

namespace Database\Seeders;

use App\Models\Nation;

use Illuminate\Database\Seeder;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nations = ["Myanmar", "Japand", "Singapore", "Thailand", "American"];

        foreach ($nations as $nation) {
            Nation::factory()->create([
                "name" => $nation,
            ]);
        }
    }
}
