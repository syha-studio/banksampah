<?php

namespace Database\Seeders;

use App\Models\Withdraw;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WithdrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 withdraws
        Withdraw::factory()->count(10)->create();
    }
}
