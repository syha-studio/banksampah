<?php

namespace Database\Factories;

use App\Models\Method;
use App\Models\MethodCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MethodFactory extends Factory
{
    protected $model = Method::class;

    public function definition(): array
    {
        return [
            'method_category_id' => MethodCategory::factory(),
            'name' => $this->faker->word,
        ];
    }
}
