<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userPageController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        return view('announcements.userPage', compact('users'));
    }
}
