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

    // public function store(Request $request)
    // {
    //     $announcement = Announcement::create(); 
    //     $announcement->title = $request->title; 
    //     $announcement->description = $request->description; 
    //     $announcement->price = $request->price; 

    // }
}
