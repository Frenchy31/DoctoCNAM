<?php

namespace Database\Seeders;

use App\Models\Role;
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
        Role::create(['name' => 'Patient']);
        Role::create(['name' => 'Médecin généraliste']);
        Role::create(['name' => 'Dermatologue']);
        Role::create(['name' => 'Ophtalmologue']);
        Role::create(['name' => 'Kinésithérapeute']);
        Role::create(['name' => 'Psychologue']);
        Role::create(['name' => 'Dentiste']);
        Role::create(['name' => 'Pédiatre']);
    }
}
