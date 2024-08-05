<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = User::class;
    
    public function definition(): array
    {
        // Set default role_id
        $roleId = Role::where('id', 1)->first()->id;

        return [
            'role_id' => $roleId,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password for all users
            'id_number' => $this->faker->unique()->numerify('ID########'),
            'name' => $this->faker->name,
            'whatsapp' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'district_id' => District::inRandomOrder()->first()->id,
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'saldo' => $this->faker->numberBetween(1000000, 50000000),
        ];
    }

}
