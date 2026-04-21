<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Roda'
        ]);
        Category::create([
            'name' => 'Rem'
        ]);
        Category::create([
            'name' => 'Gear'
        ]);
        Category::create([
            'name' => 'Suspensi'
        ]);
        Category::create([
            'name' => 'Lainnya'
        ]);
    }
}
