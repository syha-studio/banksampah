<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Branch::create(
            [
            'name' => 'Dwi Jaya Rungkut',
            'district_id' => 14
            ]
        );
        Branch::create(
            [
            'name' => 'Sejahtera Gubeng',
            'district_id' => 24
            ]
        );
    }
    
}
