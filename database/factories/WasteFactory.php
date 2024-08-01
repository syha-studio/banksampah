<?php

namespace Database\Factories;

use App\Models\Waste;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WasteFactory extends Factory
{
    protected $model = Waste::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'unit' => $this->faker->randomElement(['kg', 'ltr', 'pcs']),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
