<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Lógica para obtener los datos de la sessión actual.
Route::get('/test-data-session', function () {
    $user = Auth::user();
    return $user->id;
})->middleware(['auth']);

// Lógica para obtener los datos de la sessión actual.
Route::get('/test-data-session-request', [\App\Http\Controllers\DataSessionController::class, 'index'])
    ->middleware(['auth']);

require __DIR__ . '/auth.php';
