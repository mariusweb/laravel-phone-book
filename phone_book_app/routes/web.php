<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ShareController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('phones', PhoneController::class);
    Route::get('/share/{id}', [ShareController::class, 'show'])->name('phone.share.show');
    Route::post('/share', [ShareController::class, 'store'])->name('phone.share');
    Route::delete('/share/delete', [ShareController::class, 'destroy'])->name('phone.share.destroy');
});
