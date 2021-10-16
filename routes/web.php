<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SettingController;

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
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('book', BookController::class);

    Route::get('author/create', [SettingController::class, 'createAuthor'])->name('author.create');
    Route::post('author', [SettingController::class, 'storeAuthor']);

    Route::get('category/create', [SettingController::class, 'createCategory'])->name('category.create');
    Route::post('category', [SettingController::class, 'storeCategory']);

    Route::get('memberstatus/create', [SettingController::class, 'createMemberStatus'])->name('memberstatus.create');
    Route::post('memberstatus', [SettingController::class, 'storeMemberStatus']);

    Route::get('reservationstatus/create', [SettingController::class, 'createReservationStatus'])->name('reservationstatus.create');
    Route::post('reservationstatus', [SettingController::class, 'storeReservationStatus']);

    Route::get('reservation/', [RecordController::class, 'allReservation'])->name('reservation.index');
    Route::get('due/', [RecordController::class, 'allDue'])->name('due.index');
});

require __DIR__ . '/auth.php';
