<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
    'uses' => 'BaseController@getGuestHome',
    'as' => 'guestHome'
]);

Route::post('/',[
    'uses' => 'BaseController@postLogin',
    'as' => 'login'
]);

Route::get('/register',[
    'uses' => 'BaseController@getRegister',
    'as' => 'register'
]);

Route::post('/register',[
    'uses' => 'BaseController@postRegister',
    'as' => 'register'
]);


//USER ROUTES//
Route::group (['middleware' => 'App\Http\Middleware\UserMiddleware'], function () {

    Route::get('/home', [
        'uses' => 'UserController@getHome',
        'as' => 'home'
    ]);

    Route::get('/events/{match_id?}', [
        'uses' => 'UserController@getEvents',
        'as' => 'events'
    ]);

    Route::post('/events/{match_id?}', [
        'uses' => 'UserController@postEvents',
        'as' => 'events'
    ]);

    Route::get('/matches/{match_id?}', [
        'uses' => 'UserController@getMatches',
        'as' => 'matches'
    ]);

    Route::post('/matches/{match_id?}', [
        'uses' => 'UserController@postMatchComment',
        'as' => 'matches'
    ]);

    Route::get('/records/{category?}', [
        'uses' => 'UserController@getRecords',
        'as' => 'records'
    ]);

    Route::get('/players/{player_id?}', [
        'uses' => 'UserController@getPlayers',
        'as' => 'players'
    ]);

    Route::get('/gallery', [
        'uses' => 'UserController@getGallery',
        'as' => 'gallery'
    ]);

    Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

});

//Admin routes//
Route::group (['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {

    Route::get('/admin/home', [
        'uses' => 'AdminController@getHome',
        'as' => 'admin.home'
    ]);

    Route::post('/admin/home',[
        'uses' => 'AdminController@postHome',
        'as' => 'admin.home'
    ]);



    Route::get('/admin/matches/{match_id?}', [
        'uses' => 'AdminController@getMatches',
        'as' => 'admin.matches'
    ]);

    Route::post('/admin/matches/{match_id?}', [
        'uses' => 'AdminController@postMatches',
        'as' => 'admin.matches'
    ]);

    Route::get('/admin/players/{player_id?}', [
        'uses' => 'AdminController@getPlayers',
        'as' => 'admin.players'
    ]);

    Route::post('/admin/players/{player_id?}', [
        'uses' => 'AdminController@postPlayers',
        'as' => 'admin.players'
    ]);

    Route::post('/admin/delete' , [
       'uses' => 'AdminController@deleteUser',
       'as' => 'admin.deleteUser'
    ]);

    Route::get('/admin/gallery', [
        'uses' => 'AdminController@getGallery',
        'as' => 'admin.gallery'
    ]);

    Route::post('/admin/gallery', [
        'uses' => 'AdminController@postGallery',
        'as' => 'admin.gallery'
    ]);


});
