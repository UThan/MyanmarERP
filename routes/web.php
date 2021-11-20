<?php

use App\Http\Livewire\Book\Addbook;
use App\Http\Livewire\Member\AllMember;
use App\Http\Livewire\Member\Addmember;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Book\Booklist;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Manage\Borrowbook;
use App\Http\Livewire\Manage\Borrowlist;
use App\Http\Livewire\Setting\BookSetting;
use App\Http\Livewire\Setting\MemberSetting;
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



Route::middleware(['auth'])->group(function () {
    Route::get('/home', Dashboard::class)->name('home');

    Route::get('book', Booklist::class)->name('book');
    Route::get('book/add', Addbook::class)->name('addbook');

    Route::get('member', AllMember::class)->name('member');;
    Route::get('member/add', Addmember::class)->name('addmember');;

    Route::get('setting/book', BookSetting::class)->name('booksetting');
    Route::get('setting/member', MemberSetting::class)->name('membersetting');

    Route::get('manage/borrow', Borrowbook::class)->name('borrowbook');
    Route::get('manage/borrow/list', Borrowlist::class)->name('borrowlist');

    Route::get('test', Test::class)->name('test');
});

require __DIR__ . '/auth.php';
