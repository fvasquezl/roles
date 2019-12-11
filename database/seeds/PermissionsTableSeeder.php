<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Permissions
        Permission::create([
            'name' => 'View Users',
        ]);
        Permission::create([
            'name' => 'Show Users',
        ]);
        Permission::create([
            'name' => 'Edit Users',
        ]);
        Permission::create([
            'name' => 'Delete Users',
        ]);

        //Roles Permissions
        Permission::create([
            'name' => 'View Roles'
        ]);
        Permission::create([
            'name' => 'Show Roles'
        ]);
        Permission::create([
            'name' => 'Create Roles'
        ]);
        Permission::create([
            'name' => 'Edit Roles'
        ]);
        Permission::create([
            'name' => 'Delete Role'
        ]);


         //Productos Permissions
        Permission::create([
            'name' => 'Navegar products'
        ]);
        Permission::create([
            'name' => 'Ver detalle de producto'
        ]);
        Permission::create([
            'name' => 'Creacion de productos'
        ]);
        Permission::create([
            'name' => 'Edicion de productos'
        ]);
        Permission::create([
            'name' => 'Eliminar producto'
        ]);


        //Departments Permissions
        Permission::create([
            'name' => 'Navegar departamentos'
        ]);
        Permission::create([
            'name' => 'Ver detalle de producto'
        ]);
        Permission::create([
            'name' => 'Creacion de departamentos'
        ]);
        Permission::create([
            'name' => 'Edicion de departamentos'
        ]);
        Permission::create([
            'name' => 'Eliminar producto'
        ]);

         //Categories Permissions
        Permission::create([
            'name' => 'Navegar categorias'
        ]);
        Permission::create([
            'name' => 'Ver detalle de categorias'
        ]);
        Permission::create([
            'name' => 'Creacion de categorias'
        ]);
        Permission::create([
            'name' => 'Edicion de categorias'
        ]);
        Permission::create([
            'name' => 'Eliminar categoria'
        ]);


    }
}
