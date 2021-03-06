<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin account
        User::create([
            'id' => 1,
            'firstname' => 'Admin #1',
            'lastname' => '',
            'email' => 'test@mail.com',
            'password' => Hash::make('123456'),
            'phone' => 966,
            'role_id' => 2, // 2 is the role of an admin
        ]);

        // Create a pos account
        User::create([
            'id' => 2,
            'firstname' => 'POS #1',
            'lastname' => '',
            'email' => 'test2@mail.com',
            'password' => Hash::make('123456'),
            'phone' => 966,
            'role_id' => 3, // 3 is the role of a pos
        ]);
    }
}
