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
            'email' => 'fvasquez@local.com',
        ]);

        $user->assignRole('Admin');

        $user = factory(User::class)->create([
            'name' => 'Faustino Vasquez Limon',
            'email' => 'fvasquez01@local.com',
        ]);
        $user->departments()->attach(2);
        $user->assignRole('Gerente de sistemas');

        $user = factory(User::class)->create([
            'name' => 'Faustino Vasquez Limon',
            'email' => 'fvasquez02@local.com',
        ]);
        $user->departments()->attach(2);
        $user->assignRole('Programador Web');

        $user = factory(User::class)->create([
            'name' => 'Faustino Vasquez Limon',
            'email' => 'fvasquez03@local.com',
        ]);
        $user->departments()->attach(2);
        $user->assignRole('Programador Web');

        factory(User::class, 5)->create();

    }
}
