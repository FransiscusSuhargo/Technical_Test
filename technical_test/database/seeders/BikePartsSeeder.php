<?php

namespace Database\Seeders;

use App\Models\BikeParts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BikePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BikeParts::create([
            'name' => 'Roda Depan',
            'brand_id' => 1,
            'category_id' => 1,
            'harga' => 500000,
            'stok' => 8
        ]);
        BikeParts::create([
            'name' => 'Roda Belakang',
            'brand_id' => 2,
            'category_id' => 1,
            'harga' => 600000,     
            'stok' => 10
        ]);
        BikeParts::create([
            'name' => 'Rem Cakram',
            'brand_id' => 3,
            'category_id' => 2,
            'harga' => 300000,
            'stok' => 20
        ]);
        BikeParts::create([
            'name' => 'Gear Set',
            'brand_id' => 4,
            'category_id' => 3, 
            'harga' => 400000,
            'stok' => 5
        ]);
        BikeParts::create([
            'name' => 'Suspensi Depan',
            'brand_id' => 5,
            'category_id' => 4,
            'harga' => 800000,  
            'stok' => 8
        ]);
        BikeParts::create([
            'name' => 'Lampu Depan',
            'brand_id' => 1,
            'category_id' => 5,
            'harga' => 150000,
            'stok' => 12
        ]);
        BikeParts::create([
            'name' => 'Sadel',
            'brand_id' => 2,
            'category_id' => 5,
            'harga' => 200000,
            'stok' => 7
        ]);
         BikeParts::create([
            'name' => 'Pedal',
            'brand_id' => 3,
            'category_id' => 5,
            'harga' => 100000,
            'stok' => 20
        ]);
        BikeParts::create([
            'name' => 'Spakbor',
            'brand_id' => 4,
            'category_id' => 5,
            'harga' => 150000,
            'stok' => 10
        ]);
        BikeParts::create([
            'name' => 'Handlebar',
            'brand_id' => 5,
            'category_id' => 5,
            'harga' => 250000,
            'stok' => 5
    ]);
    }
}
