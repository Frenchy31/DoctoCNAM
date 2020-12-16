<?php

namespace Database\Factories;

use App\Models\Meetings;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meetings::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'datetime' => $this->faker->dateTimeBetween('now', '+6 months'),
            'symptome' => $this->faker->text(300)
        ];
    }
}
