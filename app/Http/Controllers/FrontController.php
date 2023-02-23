<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homePage()
    {
        $announcements = Announcement::take(9)->get()->sortByDesc('created_at');
        return view('pages.welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('pages.categoryShow', compact('category'));
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('pages.showAnnouncement', compact('announcement'));
    }
}