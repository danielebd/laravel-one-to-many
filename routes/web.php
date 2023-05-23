<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProjectController;
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



Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    //route che consente di accedere alla funzione index
    Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');

    //crea le route create,edit, destroy, ecc.. :php artisan route:list
    Route::resource('projects', ProjectController::class);

});

require __DIR__ . '/auth.php';
