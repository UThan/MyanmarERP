<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Author;
use App\Models\MemberStatus;
use App\Models\ReservationStatus;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function createAuthor()
    {
        return view('admin/addauthor');
    }

    public function storeAuthor(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->save();

        return redirect()->back()->with('success', 'Author successfully added');
    }

    public function createCategory()
    {
        return view('admin/addcategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = new Category();
        $category->category_name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'Category successfully added');
    }

    public function createMemberStatus()
    {
        return view('admin/addmemberstatus');
    }

    public function storeMemberStatus(Request $request)
    {
        $request->validate([
            'status_value' => 'required'
        ]);

        $memberstatus = new MemberStatus();
        $memberstatus->status_value = $request->status_value;
        $memberstatus->save();

        return redirect()->back()->with('success', 'Member status successfully added');
    }

    public function createReservationStatus()
    {
        return view('admin/addreservationstatus');
    }

    public function storeReservationStatus(Request $request)
    {
        $request->validate([
            'status_value' => 'required'
        ]);

        $reservationstatus = new ReservationStatus();
        $reservationstatus->status_value = $request->status_value;
        $reservationstatus->save();

        return redirect()->back()->with('success', 'Member status successfully added');
    }
}
