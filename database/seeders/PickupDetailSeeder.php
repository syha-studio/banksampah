<?php

namespace Database\Seeders;

use App\Models\PickupDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PickupDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 pickup details
        PickupDetail::factory()->count(3)->create();
    }
}
