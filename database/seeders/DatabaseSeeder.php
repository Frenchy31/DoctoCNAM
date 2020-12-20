<?php

namespace Database\Seeders;

use App\Models\Adresses;
use App\Models\User;
use App\Models\Meetings;
use Illuminate\Database\Seeder;
use function PHPUnit\Framework\never;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdresseSeeder::class,
            RolesSeeder::class,
            UserSeeder::class,
            MeetingSeeder::class
        ]);
    }
}
