<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'role_id' => 2,
                'email' => 'bintangmangrove@gmail.com',
                'password' => bcrypt('Bintangmangrove1!'), // Password default
                'id_number' => 'ID00000001',
                'name' => 'Bintang Mangrove',
                'whatsapp' => '081234567890',
                'address' => 'Gunung Anyar Tambak 3',
                'district_id' => 23,
                'branch_id' => 1, // Anda mungkin perlu mengubah sesuai dengan nama cabang yang ada di database
                'saldo' => 0,
            ]
        );

        $users = [
            ['name' => 'Janutul F', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Hamida', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Kurdi', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Maimunah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Pasikah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Legina', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Agus', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Hariyono', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Wahidah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Sulaiman', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Kiptiyah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'As\'ari', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Asrofin', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Ulwiyah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Ifah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Aris', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Edi', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Abib', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Sodik', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Sulastri', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Kirom', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Ni\'mah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Somo', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Anik Umroh', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Roni', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Ambar', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Cantik', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Sihab', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Atiq', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Arfin', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Dewi', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Alfin', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Putri K', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Maulana', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Afifah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Syaroh', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Samiran', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Abidah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Kasanah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Ach. Sudiaryo', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Alfiyah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Lutfia', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Laili', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Wiwin', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Hamiyah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Adidi', 'address' => 'Gunung Anyar Tambak 3/88'],
            ['name' => 'Nur Chakimah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Patimah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Khoiron', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Paiman', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'H. Zumaroh', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Nurus', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Jahudin', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'P. Mul', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Artimuna', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Windi', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Rian', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Samid', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Ja\'i', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Lulik Zulfa', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Maisaroh', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Arofi', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Wati', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Ulul', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Miskan', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Sudarse', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'M. Ajis', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Misnah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'H. Munir', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Rochimah', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Bayu', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Hasan', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Sutrisno', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Sadam', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Mahfiroh', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Pirnanda', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Supina', 'address' => 'Gunung Anyar Tambak 3'],
            ['name' => 'Saimad', 'address' => 'Gunung Anyar Tambak 3'],
        ];
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'address' => $user['address'],
                'email' => Str::lower(str_replace(' ', '.', $user['name'])) . '@gmail.com',
                'password' => bcrypt('password'), // Default password untuk semua user
                'id_number' => Str::random(10),
                'role_id' => 1, // Set default role_id
                'district_id' => 1, // Set default district_id
                'branch_id' => 1, // Set default branch_id
                'saldo' => 0,
            ]);
        }
    }
}
