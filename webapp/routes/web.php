<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', 'App\Http\Controllers\TaskController@index')->name('task.index');
require __DIR__.'/auth.php';

Route::get('/create', 'App\Http\Controllers\TaskController@create')->name('task.create');
Route::post('/store', 'App\Http\Controllers\TaskController@store')->name('task.store');

Route::get('/edit/{task}', 'App\Http\Controllers\TaskController@edit')->name('task.edit');
Route::put('/edit/{task}', 'App\Http\Controllers\TaskController@update')->name('task.update');

Route::delete('/task/{task}','App\Http\Controllers\TaskController@destroy')->name('task.destroy');
