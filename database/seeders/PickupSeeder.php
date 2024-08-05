<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Pickup;
use App\Models\PickupDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pickup::factory()->count(35)->create();
    }
}
