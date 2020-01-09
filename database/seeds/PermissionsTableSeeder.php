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
            'name' => 'View users',
        ]);
        Permission::create([
            'name' => 'Create users',
        ]);
        Permission::create([
            'name' => 'Update users',
        ]);
        Permission::create([
            'name' => 'Delete users',
        ]);

        //Roles Permissions
        Permission::create([
            'name' => 'View roles'
        ]);
        Permission::create([
            'name' => 'Create roles'
        ]);
        Permission::create([
            'name' => 'Update roles'
        ]);
        Permission::create([
            'name' => 'Delete roles'
        ]);


         //Productos Permissions
    
        Permission::create([
            'name' => 'View posts'
        ]);
        Permission::create([
            'name' => 'Create posts'
        ]);
        Permission::create([
            'name' => 'Update posts'
        ]);
        Permission::create([
            'name' => 'Delete posts'
        ]);

          //Productos Permissions

        // //Departments Permissions
        // Permission::create([
        //     'name' => 'View departments'
        // ]);
        // Permission::create([
        //     'name' => 'Create departments'
        // ]);
        // Permission::create([
        //     'name' => 'Update departments'
        // ]);
        // Permission::create([
        //     'name' => 'Delete departments'
        // ]);

        //  //Categories Permissions
        //  Permission::create([
        //     'name' => 'View categories'
        // ]);
        // Permission::create([
        //     'name' => 'Create categories'
        // ]);
        // Permission::create([
        //     'name' => 'Update categories'
        // ]);
        // Permission::create([
        //     'name' => 'Delete categories'
        // ]);


    }
}
