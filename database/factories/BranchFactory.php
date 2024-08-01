<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    protected $model = Branch::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'district_id' => District::inRandomOrder()->first()->id,
        ];
    }
}
