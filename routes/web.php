<?php

use App\Http\Livewire\Book\AddBook;
use App\Http\Livewire\Book\AllBook;
use App\Http\Livewire\Book\BookLocation;
use App\Http\Livewire\Member\AllMember;
use App\Http\Livewire\Member\AddMember;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Manage\BorrowBook;
use App\Http\Livewire\Manage\BorrowList;
use App\Http\Livewire\Setting\BookSetting;
use App\Http\Livewire\Setting\LocationSetting;
use App\Http\Livewire\Test;

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


Route::redirect('/', '/home');
Route::redirect('/dashboard', '/home');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', Dashboard::class)->name('home');

    Route::get('book', AllBook::class)->name('book');
    Route::get('book/add', AddBook::class)->name('addbook');
    Route::get('book/booklocation', BookLocation::class)->name('booklocation');

    Route::get('member', AllMember::class)->name('member');;
    Route::get('member/add', AddMember::class)->name('addmember');;

    Route::get('setting/book', BookSetting::class)->name('booksetting');
    Route::get('setting/location', LocationSetting::class)->name('locationsetting');

    Route::get('manage/borrow', BorrowBook::class)->name('borrowbook');
    Route::get('manage/borrow/list', BorrowList::class)->name('borrowlist');

    Route::get('test', Test::class)->name('test');
});

require __DIR__ . '/auth.php';
