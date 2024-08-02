<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Image;
use App\Models\Branch;
use App\Models\Pickup;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PickupFactory extends Factory
{
    protected $model = Pickup::class;

    public function definition(): array
    {
        $statusIds = [1, 2, 3, 5, 7, 8];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'pickup_date' => $this->faker->date(),
            'total' => $this->faker->numberBetween(10000, 100000),
            'image_id' => Image::inRandomOrder()->first()->id,
            'status_id' => $this->faker->randomElement($statusIds),
        ];
    }
}
