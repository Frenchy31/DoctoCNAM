<?php

namespace Database\Seeders;

use App\Models\Meeting;
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
        Meeting::factory()
            ->times(50000)
            ->create();
    }
}
