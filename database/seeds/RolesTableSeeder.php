<?php

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'description'   => 'Usuario con todos los accesos',
            'special'   => 'all-access'
        ]);
        Role::create([
            'name'      => 'Gerente de sistemas',
            'slug'      => 'gerente.sistemas',
            'description'   => 'Usuario con acceso a nivel gerencia',
            'special'   => null
        ]);
        Role::create([
            'name'      => 'Programador Web',
            'slug'      => 'programador.web',
            'description'   => 'Usuario con acceso a nivel programador',
            'special'   => null
        ]);
    }
}
