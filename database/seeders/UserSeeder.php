<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();

        $roles = Role::all()->pluck('name');

        foreach($users as $user){
            $user->assignRole($roles[mt_rand(0, count($roles)-1)]);
        }
    }
}
