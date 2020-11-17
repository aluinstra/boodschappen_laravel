<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceriesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/groceries', function () {
//     return controllers('groceries');
// });

Route::get('/groceries', [GroceriesController::class, 'index'])->name('groceries.index');
Route::get('/groceries/create', [GroceriesController::class, 'create'])->name('groceries.create');
Route::post('/groceries', [GroceriesController::class, 'store'])->name('groceries.store');
Route::get('/groceries/{grocerie}/edit', [GroceriesController::class, 'edit'])->name('groceries.edit');
Route::put('/groceries/{grocerie}', [GroceriesController::class, 'update'])->name('groceries.update');
Route::delete('/groceries/{grocerie}', [GroceriesController::class, 'destroy'])->name('groceries.destroy');


Route::redirect('/', '/groceries');
