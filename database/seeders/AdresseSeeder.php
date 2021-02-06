<?php

namespace Database\Seeders;

use App\Models\Adresses;
use Database\Factories\AdressesFactory;
use Illuminate\Database\Seeder;

class AdresseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adresses::factory()
            ->times(AdressesFactory::$nbRowsToCreate)
            ->create();
    }
}
