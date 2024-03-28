<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamplesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/react/increment', 'ExamplesController@increment');
Route::get('/increment', [ExamplesController::class,'increment']);
Route::get('/videos', [ExamplesController::class,'videos']);
