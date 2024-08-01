<?php

namespace Database\Seeders;

use App\Models\WastePrice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WastePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 waste prices
        WastePrice::factory()->count(10)->create();
    }
}
