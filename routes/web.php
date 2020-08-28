<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'main')->name('enter');

Route::middleware('throttle:10,10')->post('login', 'LoginController@login')->name('login');

Route::middleware('myauth')->group(function (){
    Route::view('home', 'home')->name('home');

    Route::prefix('user')->middleware('role_user')->group(function (){
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('orders', 'UserController@orders')->name('user.orders');
        Route::delete('orders/{order}', 'UserController@deleteOrder')->name('user.delete_order');
    });

    Route::prefix('admin')->middleware('role_admin')->group(function (){
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/users', 'AdminController@users')->name('admin.users');
        Route::get('/log', 'AdminController@log')->name('admin.log');
    });

    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
});

Route::get('logout', function (\Illuminate\Http\Request $request){
   \App\Log::create([
       'user' => session('username') ?? '-----',
       'type_event_id' => 2,
       'description' => 'Выход из системы',
   ]);
    $request->session()->flush();
    return redirect()->route('enter')->with(['message' => 'Вы вышли из системы']);
})->name('logout');
