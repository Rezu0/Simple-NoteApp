<?php

use App\Http\Controllers\noteApps;
use App\Models\noteApp;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [noteApps::class, 'index']);
Route::post('/todo', [noteApps::class, 'postInputNote']);
Route::get('todo/{id}/edit', [noteApps::class, 'editNote']);
Route::delete('todo/{id}/delete', [noteApps::class, 'deleteNote']);
Route::put('todo/{id}', [noteApps::class, 'updateNote']);
Route::put('finish/{id}', [noteApps::class, 'updateFinishWork']);
Route::get('todo/{noteApp:slug}', [noteApps::class, 'showPerSlug']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
