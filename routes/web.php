<?php

use App\Http\Controllers\MylogController;
use App\Http\Controllers\StafflogController;
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

Route::get('/jabatan', function () {
    return view('jabatan');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('mylog')->group(function () {
    Route::get('/', [MylogController::class, 'index']);
    Route::get('/{id}', [MylogController::class, 'show']);
    Route::post('/', [MylogController::class, 'store']);
});
// Route::resource('/mylog', MylogController::class);


Route::prefix('staff')->group(function () {
    Route::get('/', [StafflogController::class, 'index']);
    Route::get('/{id}', [StafflogController::class, 'show']);
    Route::post('/log/{id}', [StafflogController::class, 'update']);
});
// Route::resource('/staff', StafflogController::class)->only(['index', 'create', 'show']);
