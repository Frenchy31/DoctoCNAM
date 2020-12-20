<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create(['name' => 'Patient']);
        Roles::create(['name' => 'Médecin généraliste']);
        Roles::create(['name' => 'Dermatologue']);
        Roles::create(['name' => 'Ophtalmologue']);
        Roles::create(['name' => 'Kinésithérapeute']);
        Roles::create(['name' => 'Psychologue']);
        Roles::create(['name' => 'Dentiste']);
        Roles::create(['name' => 'Pédiatre']);
    }
}
