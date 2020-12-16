<?php

namespace Database\Seeders;

use App\Models\Meetings;
use App\Models\User;
use Database\Factories\MeetingsFactory;
use Faker\Factory;
use Faker\Provider\Address;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meetings::factory()
            ->has(User::factory()->count(2))
            ->times(100000);
    }
}
