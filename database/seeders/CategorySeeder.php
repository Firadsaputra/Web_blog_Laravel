<?php

namespace Database\Seeders;


use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'UI/UX',
            'slug' => 'ui/ux',
            'color' => 'emerald'
        ]);

        Category::factory()->create([
            'name' => 'Web Programming',
            'slug' => 'web_programing',
            'color' => 'red'
        ]);

        Category::factory()->create([
            'name' => 'Design',
            'slug' => 'design',
            'color' => 'amber'
        ]);

        Category::factory()->create([
            'name' => 'Komputer Science',
            'slug' => 'komputer_science',
            'color' => 'lime'
        ]);

        Category::factory()->create([
            'name' => 'Teoligi',
            'slug' => 'teologi',
            'color' => 'green'
        ]);
    }
}
