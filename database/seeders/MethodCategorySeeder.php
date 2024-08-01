<?php

namespace Database\Seeders;

use App\Models\MethodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MethodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methodcategories = ['Transfer Bank', 'Transfer E-Wallet', 'Tarik Tunai'];

        foreach ($methodcategories as $methodcategory) {
            MethodCategory::create(['name' => $methodcategory]);
        }
    }
}
