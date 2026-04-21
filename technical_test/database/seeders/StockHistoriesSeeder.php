<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StockHistories;

class StockHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StockHistories::create([
            'bike_part_id' => 1,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 10,
            'stock_after' => 10,
            'note' => 'Initial stock'
        ]);
        StockHistories::create([
            'bike_part_id' => 1,
            'user_id' => 1,
            'type' => 'out',
            'quantity' => 2,
            'stock_after' => 8,
            'note' => 'Sold 2 units'
        ]);
         StockHistories::create([
            'bike_part_id' => 2,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 15,
            'stock_after' => 15,
            'note' => 'Initial stock'
        ]);
         StockHistories::create([
            'bike_part_id' => 2,
            'user_id' => 1,
            'type' => 'out',
            'quantity' => 5,
            'stock_after' => 10,
            'note' => 'Sold 5 units'
        ]);
           StockHistories::create([
            'bike_part_id' => 3,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 20,
            'stock_after' => 20,
            'note' => 'Initial stock'
        ]);
           StockHistories::create([
            'bike_part_id' => 4,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 5,
            'stock_after' => 5,
            'note' => 'Initial stock'
        ]);
           StockHistories::create([
            'bike_part_id' => 5,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 8,
            'stock_after' => 8,
            'note' => 'Initial stock'
        ]);
           StockHistories::create([
            'bike_part_id' => 6,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 12,
            'stock_after' => 12,
            'note' => 'Initial stock'
        ]);
           StockHistories::create([
            'bike_part_id' => 7,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 7,
            'stock_after' => 7,
            'note' => 'Initial stock'
        ]);
           StockHistories::create([
            'bike_part_id' => 8,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 20,
            'stock_after' => 20,
            'note' => 'Initial stock'
        ]);
           StockHistories::create([
            'bike_part_id' => 9,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 10,
            'stock_after' => 5,
            'note' => 'Initial stock'
        ]);
        StockHistories::create([
            'bike_part_id' => 10,
            'user_id' => 1,
            'type' => 'in',
            'quantity' => 5,
            'stock_after' => 5,
            'note' => 'Initial stock'
        ]);
    }
}
