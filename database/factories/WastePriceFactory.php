<?php

namespace Database\Factories;

use App\Models\Waste;
use App\Models\Branch;
use App\Models\WastePrice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WastePriceFactory extends Factory
{
    protected $model = WastePrice::class;

    public function definition(): array
    {
        return [
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'waste_id' => Waste::inRandomOrder()->first()->id,
            'price' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
