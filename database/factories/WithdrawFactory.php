<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Image;
use App\Models\Branch;
use App\Models\Method;
use App\Models\Status;
use App\Models\Withdraw;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WithdrawFactory extends Factory
{
    protected $model = Withdraw::class;

    public function definition(): array
    {
        $statusIds = [1, 2, 4, 6, 7, 9];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'method_id' => Method::inRandomOrder()->first()->id,
            'account_number' => $this->faker->bankAccountNumber,
            'total' => $this->faker->numberBetween(10000, 1000000),
            'message' => $this->faker->sentence,
            'image_id' => Image::inRandomOrder()->first()->id,
            'status_id' => $this->faker->randomElement($statusIds),
        ];
    }
}
