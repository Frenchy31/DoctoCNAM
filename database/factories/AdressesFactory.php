<?php

namespace Database\Factories;

use App\Models\Adresses;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdressesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adresses::class;

    public static int $nbRowsToCreate = 3000;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetName,
            'postal_code' => $this->faker->postcode,
            'city' => $this->faker->city
        ];
    }
}
