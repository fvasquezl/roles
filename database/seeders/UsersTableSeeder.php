<?php
namespace Database\Seeders;
use App\Models\User;
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

        $user = User::factory()->create([
            'name' => 'Faustino Vasquez Limon',
            'username' => 'fvasquez',
            'email' => 'admin@local.com',
            'password' => 'ZpNi012?!'
        ]);

        $user->assignRole(1);

        $user = User::factory()->create([
            'name' => 'Miguel Angel Torres',
            'email' => 'mtorres@serenacare.net',
            'password' => 'password'
        ]);
        $user->departments()->attach(1);
        $user->assignRole([1,3]);

        $user = User::factory()->create([
            'name' => 'Sebastian Vasquez',
            'email' => 'svasquez@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(7);
        $user->assignRole([4]);


        $user = User::factory()->create([
            'name' => 'Secretaria It',
            'email' => 'sit@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(7);
        $user->assignRole([7]);
    }
}
