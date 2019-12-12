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
            'name' => 'Create Users',
        ]);
        Permission::create([
            'name' => 'Update Users',
        ]);
        Permission::create([
            'name' => 'Delete Users',
        ]);

        //Roles Permissions
        Permission::create([
            'name' => 'View Roles'
        ]);
        Permission::create([
            'name' => 'Create Roles'
        ]);
        Permission::create([
            'name' => 'Update Roles'
        ]);
        Permission::create([
            'name' => 'Delete Roles'
        ]);


         //Productos Permissions
    
        Permission::create([
            'name' => 'View Posts'
        ]);
        Permission::create([
            'name' => 'Create Posts'
        ]);
        Permission::create([
            'name' => 'Update Posts'
        ]);
        Permission::create([
            'name' => 'Delete Posts'
        ]);


        //Departments Permissions
        Permission::create([
            'name' => 'View Departments'
        ]);
        Permission::create([
            'name' => 'Create Departments'
        ]);
        Permission::create([
            'name' => 'Update Departments'
        ]);
        Permission::create([
            'name' => 'Delete Departments'
        ]);

         //Categories Permissions
         Permission::create([
            'name' => 'View Categories'
        ]);
        Permission::create([
            'name' => 'Create Categories'
        ]);
        Permission::create([
            'name' => 'Update Categories'
        ]);
        Permission::create([
            'name' => 'Delete Categories'
        ]);


    }
}
