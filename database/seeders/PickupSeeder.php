<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Pickup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Image::count() == 0) {
            $this->call(ImageSeeder::class);
        }
        
        Pickup::factory()->count(35)->create();
    }
}
