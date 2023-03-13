<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\BecomeRevisor;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $announcements_to_check = Announcement::where('is_accepted', null)->count();
        $announcementsToCheck = Announcement::where('is_accepted', null)->get();
        $checkedAnnouncements = Announcement::where('is_accepted', '!=', null)->orderByDesc('updated_at')->paginate(5);
        
        return view('revisor.index', compact('announcementsToCheck', 'announcements_to_check', 'checkedAnnouncements'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        $announcement->reject_message = '';
        return redirect()->route('revisor.index')->with('message', 'Complimenti, hai accettato l\'annuncio');
    }
    public function rejectAnnouncement(Announcement $announcement, Request $request)
    {
        $this->validate($request, [
            'reject_message' => 'required|max:250', 
        ]); 
        $announcement->reject_message = $request->reject_message; 
        $announcement->setAccepted(false);
        return redirect()->route('revisor.index')->with('message', 'Annuncio rifiutato');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user())); 
        return redirect()->back()->with('message', 'Richiesta inviata correttamente'); 
    }

    public function makeUserRevisor(User $user)
    {   
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]); 
        return redirect()->route('welcome')->with('success', 'L\'utente è diventato revisore');
    }
}
