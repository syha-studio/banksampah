<?php

namespace Database\Seeders;

use App\Models\Method;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            'Bank Jatim', 'BCA', 'BRI', 'ShopeePay', 'Dana', 'Ovo'
        ];

        $jumlahMethod = [
            3, 3
        ];

        // Membuat array ID kabupaten/kota
        $arrayIds = [];

        // ID dimulai dari 1 untuk kabupaten Pacitan
        $id = 1;

        // Mengisi array dengan ID yang sesuai
        foreach ($jumlahMethod as $jumlah) {
            for ($i = 0; $i < $jumlah; $i++) {
                $arrayIds[] = $id;
            }
            $id++;
        }

        foreach ($methods as $index => $method) {
            // Pastikan $arrayIds[$index] adalah integer yang valid
            if (isset($arrayIds[$index])) {
                Method::create([
                    'name' => $method,
                    'method_category_id' => $arrayIds[$index]
                ]);
            }
        }
    }
}
