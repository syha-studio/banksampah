<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
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
        User::create(
            [
                'role_id' => 2,
                'email' => 'dwijayarungkut@gmail.com',
                'password' => bcrypt('password'), // Password default
                'id_number' => 'ID00000001',
                'name' => 'Dwi Jaya Rungkut',
                'whatsapp' => '081234567890',
                'address' => 'Alamat Dwi Jaya Rungkut',
                'district_id' => 14,
                'branch_id' => 1, // Anda mungkin perlu mengubah sesuai dengan nama cabang yang ada di database
                'saldo' => 0,
            ]
        );
        User::create(
            [
                'role_id' => 2,
                'email' => 'sejahteragubeng@gmail.com',
                'password' => bcrypt('password'), // Password default
                'id_number' => 'ID00000002',
                'name' => 'Sejahtera Gubeng',
                'whatsapp' => '081234567891',
                'address' => 'Alamat Sejahtera Gubeng',
                'district_id' => 24,
                'branch_id' => 2, // Anda mungkin perlu mengubah sesuai dengan nama cabang yang ada di database
                'saldo' => 0,
            ],
        );

        // Create the remaining users with default role_id (1)
        User::factory()->count(25)->create(); // Adjust the total number as needed
    }
}
