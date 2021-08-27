<?php

namespace Database\Factories;

use App\Managers\UsersManager;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber
        ];
    }
}
