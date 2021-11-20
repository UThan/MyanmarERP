<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate(20);
        return view('admin.allmember', ['members' => $members]);
    }

    public function create()
    {
    }
}
