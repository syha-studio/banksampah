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
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('password'), // Default password for all users
            'email' => $this->faker->unique()->safeEmail,
            'name' => $this->faker->name,
            'whatsapp' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'saldo' => $this->faker->numberBetween(1000000, 50000000),
        ];
    }

}
