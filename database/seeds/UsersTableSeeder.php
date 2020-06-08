<?php

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
        App\User::create([
            'name' => 'Admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@afritech.com',
            'admin' => 1,
            'avatar'=> asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name' => 'Emily Myers',
            'password' => bcrypt('password'),
            'email' => 'emilym@gmail.com',
            'avatar' => asset('avatars/avatar.png')
        ]);
    }
}
