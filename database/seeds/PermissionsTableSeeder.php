<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

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
            'name' => 'Navegar Usuarios',
            'slug' => 'users.index',
            'description' => 'Listar y navegar todos los usuarios del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de usuarios',
            'slug' => 'users.show',
            'description' => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de Usuarios',
            'slug' => 'users.edit',
            'description' => 'Editar cualquier dato de los usuarios del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Usuario',
            'slug' => 'users.delete',
            'description' => 'Eliminar usuarios del sistema',
        ]);

        //Roles Permissions
        Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'roles.index',
            'description' => 'Listar y navegar todos los roles del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de rol',
            'slug' => 'roles.show',
            'description' => 'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de roles',
            'slug' => 'roles.create',
            'description' => 'Crear un rol dentro del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de roles',
            'slug' => 'roles.edit',
            'description' => 'Editar cualquier dato de los roles del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar rol',
            'slug' => 'roles.delete',
            'description' => 'Eliminar roles del sistema',
        ]);


         //Productos Permissions
        Permission::create([
            'name' => 'Navegar products',
            'slug' => 'products.index',
            'description' => 'Listar y navegar todos los productos del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de producto',
            'slug' => 'products.show',
            'description' => 'Ver en detalle cada producto del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de productos',
            'slug' => 'products.create',
            'description' => 'Crear un producto dentro del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de productos',
            'slug' => 'products.edit',
            'description' => 'Editar cualquier dato de los productos del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar producto',
            'slug' => 'products.delete',
            'description' => 'Eliminar productos del sistema',
        ]);


        //Departments Permissions
        Permission::create([
            'name' => 'Navegar departamentos',
            'slug' => 'departments.index',
            'description' => 'Listar y navegar todos los departamentos del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de producto',
            'slug' => 'departments.show',
            'description' => 'Ver en detalle cada producto del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de departamentos',
            'slug' => 'departments.create',
            'description' => 'Crear un producto dentro del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de departamentos',
            'slug' => 'departments.edit',
            'description' => 'Editar cualquier dato de los departamentos del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar producto',
            'slug' => 'departments.delete',
            'description' => 'Eliminar departamentos del sistema',
        ]);


    }
}
