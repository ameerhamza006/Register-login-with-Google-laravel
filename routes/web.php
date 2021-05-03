<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//login
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
});

//callback
Route::get('/login/google/callback', function () {
   // $user = Socialite::driver('google')->stateless()->user();
    $user = Socialite::driver('google')->stateless()->user();

   $abc = new RegisterController();
   $abc->social_login($user);

    return redirect()->route('home');
     //$user->token;
}); 












