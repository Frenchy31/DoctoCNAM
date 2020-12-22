<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_id' => rand(1,50000),
            'datetime' => $this->faker->dateTimeBetween('now', '+6 months'),
            'symptome' => $this->faker->text(300)
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Meeting $meeting){
             //...
        })->afterCreating(function (Meeting $meeting){
             $meeting->users()->attach(User::where('role_id', 1)->get()->random()->id);
             $meeting->users()->attach(User::where('role_id', rand(2,8))->get()->random()->id);
             $meeting->save();
        });
    }

}
