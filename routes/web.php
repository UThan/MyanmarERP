<?php

use App\Http\Livewire\Admin\Addproperty;
use App\Http\Livewire\Admin\Editproperty;
use App\Http\Livewire\Admin\Selectproperties;
use App\Http\Livewire\Admin\Setting;
use App\Http\Livewire\Admin\Showproperty;
use App\Http\Livewire\Book\AddBook;
use App\Http\Livewire\Book\AllBook;
use App\Http\Livewire\Book\BookLocation;
use App\Http\Livewire\Book\EditBook;
use App\Http\Livewire\Member\AllMember;
use App\Http\Livewire\Member\AddMember;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Institution\AllInstitution;
use App\Http\Livewire\Institution\AddInstitution;
use App\Http\Livewire\Institution\EditInstitution;
use App\Http\Livewire\Manage\BorrowBook;
use App\Http\Livewire\Manage\BorrowList;
use App\Http\Livewire\Member\EditMember;
use App\Http\Livewire\Setting\BookSetting;
use App\Http\Livewire\Setting\LocationSetting;

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
    Route::get('book/edit/{book}', Editbook::class)->name('editbook');
    Route::get('book/booklocation', BookLocation::class)->name('booklocation');

    Route::get('institution', AllInstitution::class)->name('institution');
    Route::get('institution/add', AddInstitution::class)->name('addinstitution');
    Route::get('institution/edit/{institution}', EditInstitution::class)->name('editinstitution');

    Route::get('member', AllMember::class)->name('member');
    Route::get('member/add', AddMember::class)->name('addmember');
    Route::get('member/edit/{member}', EditMember::class)->name('editmember');
    
    Route::get('setting/book', BookSetting::class)->name('booksetting');
    Route::get('setting/location', LocationSetting::class)->name('locationsetting');

    Route::get('manage/borrow', BorrowBook::class)->name('borrowbook');
    Route::get('manage/borrow/list', BorrowList::class)->name('borrowlist');

    Route::get('admin/setting', Selectproperties::class)->name('setting');
    Route::get('admin/setting/{property}', Showproperty::class)->name('property');
    Route::get('admin/setting/{property}/add', Addproperty::class)->name('addproperty');
    Route::get('admin/setting/{property}/edit/{id}', Editproperty::class)->name('editproperty');
  
});

require __DIR__ . '/auth.php';
