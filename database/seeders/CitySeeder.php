<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ['KOTA SURABAYA','KABUPATEN SIDOARJO'];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}


// $cities = ['KABUPATEN PACITAN', 'KABUPATEN PONOROGO', 'KABUPATEN TRENGGALEK', 'KABUPATEN TULUNGAGUNG',
//         'KABUPATEN BLITAR', 'KABUPATEN KEDIRI', 'KABUPATEN MALANG', 'KABUPATEN LUMAJANG', 'KABUPATEN JEMBER',
//         'KABUPATEN BANYUWANGI', 'KABUPATEN BONDOWOSO', 'KABUPATEN SITUBONDO', 'KABUPATEN PROBOLINGGO',
//         'KABUPATEN PASURUAN', 'KABUPATEN SIDOARJO', 'KABUPATEN MOJOKERTO', 'KABUPATEN JOMBANG',
//         'KABUPATEN NGANJUK', 'KABUPATEN MADIUN', 'KABUPATEN MAGETAN', 'KABUPATEN NGAWI', 'KABUPATEN BOJONEGORO',
//         'KABUPATEN TUBAN', 'KABUPATEN LAMONGAN', 'KABUPATEN GRESIK', 'KABUPATEN BANGKALAN', 'KABUPATEN SAMPANG',
//         'KABUPATEN PAMEKASAN', 'KABUPATEN SUMENEP', 'KOTA KEDIRI', 'KOTA BLITAR', 'KOTA MALANG', 'KOTA PROBOLINGGO',
//         'KOTA PASURUAN', 'KOTA MOJOKERTO', 'KOTA MADIUN', 'KOTA SURABAYA', 'KOTA BATU'];
