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

Auth::routes();

Route::get('/', 'Front\IndexController@index')->name('index');
Route::get('/event/{event}', 'Front\IndexController@event')->name('event');
Route::post('/event-registration/{event}', 'Front\IndexController@event_registration')->name('event_registration');

Route::group([
    'middleware' => ['auth', 'can:user-panel'],
],
    function () {
        Route::get('/profile', 'Front\IndexController@profile')->name('profile');
        Route::post('/profile-save', 'Front\IndexController@profile_save')->name('profile_save');
    }
);

Route::group([
        'prefix' => 'admin',
        'middleware' => ['auth', 'can:admin-panel'],
    ],
    function () {
        Route::get('/', 'Admin\IndexController@index')->name('admin.index');

        Route::resource('users', 'Admin\UserController');
        Route::resource('events', 'Admin\EventController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::resource('eventregistrations', 'Admin\EventregistrationController');
    }
);
