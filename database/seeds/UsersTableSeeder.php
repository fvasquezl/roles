<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            'name' => 'Faustino Vasquez Limon',
            'email' => 'admin@local.com',
            'password' => 'password'
        ]);

        $user->assignRole(1);

        $user = factory(User::class)->create([
            'name' => 'Gerente de Sistemas',
            'email' => 'git@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(2);
        $user->assignRole(2);

        $user = factory(User::class)->create([
            'name' => 'Gerente de RH',
            'email' => 'grh@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(3);
        $user->assignRole(2);

        $user = factory(User::class)->create([
            'name' => 'Gerente de Contabilidad',
            'email' => 'gcf@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(4);
        $user->assignRole(2);


        $user = factory(User::class)->create([
            'name' => 'Programador',
            'email' => 'pit@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(2);
        $user->assignRole(3);


        $user = factory(User::class)->create([
            'name' => 'Secretaria IT',
            'email' => 'sit@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(2);
        $user->assignRole(4);

        $user = factory(User::class)->create([
            'name' => 'Secretaria RH',
            'email' => 'srh@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(3);
        $user->assignRole(4);

        $user = factory(User::class)->create([
            'name' => 'Secretaria de Contabilidad',
            'email' => 'scf@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(4);
        $user->assignRole(4);

        factory(User::class, 5)->create();

    }
}
