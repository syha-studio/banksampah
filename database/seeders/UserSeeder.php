<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate users with default role_id (1) and role_id 2 only 5 times
        $users = User::factory()->count(5)->state([
            'role_id' => Role::where('id', 2)->first()->id,
        ])->create();

        // Create the remaining users with default role_id (1)
        User::factory()->count(25)->create(); // Adjust the total number as needed
    }
}
