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

    Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    // POS register 
    Route::post('/register' , function(){
        $req_data = request()->only([
            "firstname",
            "lastname",
            "email",
            "phone",
            "lang",
        ]);

        $req_data['password'] = Hash::make(request()->input('password'));

        $user = App\User::create($req_data);
        
        return $user;
    });

});

// Resources
// Route::resource('users', 'UserConstroller');
