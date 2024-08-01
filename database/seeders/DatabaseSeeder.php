<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            BranchSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            WasteSeeder::class,
            WastePriceSeeder::class,
            StatusSeeder::class,
            MethodCategorySeeder::class,
            MethodSeeder::class,
            PickupSeeder::class,
            PickupDetailSeeder::class,
            WithdrawSeeder::class,
        ]);

    }
}
