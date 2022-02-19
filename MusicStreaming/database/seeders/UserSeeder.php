<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $role_admin = Role::where('name', 'admin')->first();
    $role_user = Role::where('name', 'user')->first();

    $admin = new User();
    $admin->name = 'Kenji Dasal';
    $admin->email = 'kdasal@larafest.ie';
    $admin->password = Hash::make('password');
    $admin->save();

    $admin->roles()->attach($role_admin);

    $user = new User();
    $user->name = 'Aito Ryu';
    $user->email = 'Aryu@larafest.ie';
    $user->password = Hash::make('password');
    $user->save();

    $user->roles()->attach($role_user);
    }
}
