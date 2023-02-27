<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
          $announcementsToCheck = Announcement::where('is_accepted', null)->first(); 
          return view('revisor.index', compact('announcementsToCheck')); 
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        // $announcement->setAccepted(true); 
    }
}
