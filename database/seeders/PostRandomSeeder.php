<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostRandomSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 25; $i++) {
            Post::create([
                'title'       => Str::title(fake()->words(3, true)),
                'description' => fake()->sentence(10),
            ]);
        }
    }
}