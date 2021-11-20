<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchBook()
    {
        return view("admin.searchbook");
    }

    public function searchMember()
    {
        return view("admin.searchmember");
    }
}
