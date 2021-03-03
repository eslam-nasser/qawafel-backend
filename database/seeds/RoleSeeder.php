<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
