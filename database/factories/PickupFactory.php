<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Image;
use App\Models\Pickup;
use App\Models\PickupDetail;
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
            'status_id' => $this->faker->randomElement($statusIds),
        ];
    }
    
    public function configure(): self
    {
        return $this->afterCreating(function (Pickup $pickup) {
            // Create PickupDetail and associate it with the Pickup
            PickupDetail::factory()->count(3)->create([
                'pickup_id' => $pickup->id,
            ]);
        });
    }
}
