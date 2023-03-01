<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homePage()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('id', 'desc')->paginate(8);
        // $announcements = Announcement::take(8)->get()->sortByDesc('created_at');
        return view('pages.welcome', compact('announcements'));
    }

    public function categoryShow(Category $category, Announcement $announcement)
    {
        $announcement->where('is_accepted', false)->get();
        return view('pages.categoryShow', compact('category', 'announcement'));
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('pages.showAnnouncement', compact('announcement'));
    }

    public function searchAnnouncements(Request $request)
    {
        // dd($request);
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('pages.index', compact('announcements'));
    }

    public function workWithUs()
    {
        return view('pages.workWithUs'); 
    }
}