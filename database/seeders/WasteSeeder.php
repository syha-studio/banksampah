<?php

namespace Database\Seeders;

use App\Models\Waste;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 wastes
        Waste::factory()->count(10)->create();
    }
}
