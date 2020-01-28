<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
            'display_name' => 'Administrador'
        ]);
        Role::create([
            'name'      => 'Manager',
            'display_name' => 'Gerente'
        ]);
        Role::create([
            'name'      => 'Programmer',
            'display_name' => 'Programador'
        ]);

        Role::create([
            'name'      => 'Assistant',
            'display_name' => 'Secretaria'
        ]);
    }
}
