<?php

use App\User;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name'=> 'Faustino Vasquez Limon',
            'email' => 'fvasquez@local.com',
        ]);

        $user->assignRoles('Admin');
        
        factory(User::class,20)->create();
        
    }
}
