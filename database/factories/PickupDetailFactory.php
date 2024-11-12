<?php

namespace Database\Factories;

use App\Models\Pickup;
use App\Models\WastePrice;
use App\Models\PickupDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PickupDetailFactory extends Factory
{
    protected $model = PickupDetail::class;

    public function definition(): array
    {
        $wastePrice = WastePrice::inRandomOrder()->first();
        $qty = $this->faker->numberBetween(1, 100);
        $total = $qty * $wastePrice->price;

        return [
            'pickup_id' => Pickup::factory(),
            'wasteprice' => $wastePrice->price,
            'qty' => $qty,
            'total' => $total,
        ];
    }
}
