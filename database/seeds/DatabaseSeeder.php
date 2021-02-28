<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RolesTableSeeder::class);

        if (App::environment() === 'production') {
            exit('Bruh! its production!');
        }

        Role::create([
            'id'            => 1,
            'name'          => 'root',
            'description'   => ''
        ]);

        Role::create([
            'id'            => 2,
            'name'          => 'admin',
            'description'   => ''
        ]);

        Role::create([
            'id'            => 3,
            'name'          => 'pos',
            'description'   => ''
        ]);

        Role::create([
            'id'            => 4,
            'name'          => 'vendor_admin',
            'description'   => ''
        ]);
    }
}
