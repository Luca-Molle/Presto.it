<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $announcements_to_check = Announcement::where('is_accepted', null)->count();
        $announcementsToCheck = Announcement::where('is_accepted', null)->get();
        return view('revisor.index', compact('announcementsToCheck', 'announcements_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->route('revisor.index')->with('message', 'Complimenti, hai accettato l\'annuncio');
    }
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->route('revisor.index')->with('message', 'Annuncio rifiutato');
    }
}
