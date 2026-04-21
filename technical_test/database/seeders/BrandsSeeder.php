<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brands;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brands::create([
            'name' => 'Shimano'
        ]);
        Brands::create([
            'name' => 'Polygon'
        ]);
        Brands::create([
            'name' => 'United'
        ]);
         Brands::create([
            'name' => 'Wimcycle'
        ]);
         Brands::create([
            'name' => 'Pacific'
        ]);
    }
}
