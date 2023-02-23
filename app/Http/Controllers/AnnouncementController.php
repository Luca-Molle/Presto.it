<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement; 

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('announcements.create'); 
    }

    public function index()
    {
        $announcements = Announcement::paginate(6);
        return view('pages.index', compact('announcements'));
    }
}
