<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Menunggu Konfirmasi', 'Sudah Disetujui', 'Dalam Perjalanan', 'Sedang Diproses',
            'Sudah Diambil', 'Sudah Ditransfer', 'Dibatalkan', 'Gagal Diambil', 'Gagal Transfer'
        ];

        foreach ($statuses as $status) {
            Status::create(['name' => $status]);
        }
    }
}
