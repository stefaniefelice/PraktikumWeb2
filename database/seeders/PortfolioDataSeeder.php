<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class PortfolioDataSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Web', 'Mobile', 'Desktop'] as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        foreach (['Laravel', 'MySQL', 'Bootstrap', 'PHP', 'JavaScript'] as $name) {
            Technology::firstOrCreate(['name' => $name]);
        }

        $skills = [
            'PHP'        => 85,
            'Laravel'    => 80,
            'MySQL'      => 75,
            'HTML & CSS' => 90,
            'JavaScript' => 60,
        ];

        foreach ($skills as $name => $level) {
            Skill::firstOrCreate(['name' => $name], ['level' => $level]);
        }

        // project lama (dari pertemuan sebelumnya) belum punya kategori
        $web = Category::where('name', 'Web')->first();
        Project::whereNull('category_id')->update(['category_id' => $web->id]);
    }
}