<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Auth routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    // POS & VA register 
    Route::post('/register' , function(){
        $req_data = request()->only([
            "firstname",
            "lastname",
            "email",
            "phone",
            "lang",
            "role"
        ]);
        // hashing user's password
        $req_data['password'] = Hash::make(request()->input('password'));
        // getting user role 
        $role = App\Role::where('name', request()->input('role'))->first();
        if(
            (
                request()->input('role') != 'pos' && 
                request()->input('role') != 'vendor_admin'
            ) || 
            !$role
        ){
            return [
                'error' => 'Only roles allowed are (pos, vendor_admin)!'
            ];
        }
        $req_data['role_id'] = $role->id;
        // saving user to db
        $user = App\User::create($req_data);
        
        return $user;
    });

    // Admins register
    Route::post('/register-admin' , function(){
        $req_data = request()->only([
            "firstname",
            "lastname",
            "email",
            "phone",
            "lang",
        ]);
        // hashing user's password
        $req_data['password'] = Hash::make(request()->input('password'));
        // getting user role 
        $role = App\Role::where('name', 'admin')->first();
        $req_data['role_id'] = $role->id;
        // saving user to db
        $user = App\User::create($req_data);
        return $user;
    });

});

// Resources
Route::group([
	'middleware' => ['auth', 'roles'],
	'roles' => ['admin', 'pos']
], function () {
    Route::resource('products', 'ProductController');
    Route::resource('vendors', 'VendorController');
});
