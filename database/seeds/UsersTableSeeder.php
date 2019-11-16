<?php

use App\User;
use Illuminate\Database\Seeder;

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
        
        $user = factory(User::class)->create([
            'name'=> 'Faustino Vasquez Limon',
            'email' => 'fvasquez01@local.com',
        ]);
        $user->departments()->attach(2);
        $user->assignRoles('gerente.sistemas');

        $user = factory(User::class)->create([
            'name'=> 'Faustino Vasquez Limon',
            'email' => 'fvasquez02@local.com',
        ]);
        $user->departments()->attach(2);
        $user->assignRoles('programador.web');

        $user = factory(User::class)->create([
            'name'=> 'Faustino Vasquez Limon',
            'email' => 'fvasquez03@local.com',
        ]);
        $user->departments()->attach(2);
        $user->assignRoles('programador.web');


        factory(User::class,5)->create();
        
    }
}
