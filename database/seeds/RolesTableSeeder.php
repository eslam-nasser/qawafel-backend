<?php
// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
// use Illuminate\Database\Eloquent\Model;
// use App\Role;

// class RolesTableSeeder extends Seeder{

//     public function run()
//     {

//         if (App::environment() === 'production') {
//             exit('I just stopped you getting fired. Love, Amo.');
//         }

//         DB::table('role')->truncate();

//         Role::create([
//             'id'            => 1,
//             'name'          => 'root',
//             'description'   => ''
//         ]);

//         Role::create([
//             'id'            => 2,
//             'name'          => 'admin',
//             'description'   => ''
//         ]);

//         Role::create([
//             'id'            => 3,
//             'name'          => 'pos',
//             'description'   => ''
//         ]);

//         Role::create([
//             'id'            => 4,
//             'name'          => 'vendor_admin',
//             'description'   => ''
//         ]);
//     }

// }