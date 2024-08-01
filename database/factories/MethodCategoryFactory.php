<?php

namespace Database\Factories;

use App\Models\MethodCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MethodCategoryFactory extends Factory
{
    protected $model = MethodCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word
        ];
    }
}
