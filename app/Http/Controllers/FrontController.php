<?php

namespace App\Http\Controllers;

use App\Mail\ContactSeller;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Metadata\Parser\AnnotationParser;

class FrontController extends Controller
{
    public function homePage()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('id', 'desc')->paginate(8);
        // $announcements = Announcement::take(8)->get()->sortByDesc('created_at');
        return view('pages.welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        $announcements = $category->announcements();
        return view('pages.categoryShow', compact('category', 'announcements'));
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

    public function contactSeller(Request $request)
    {
        $this->validate($request,[
        
            'title' => 'required',
            'seller' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]); 

        $data = [
            'seller'=> $request->seller,
            'title' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]; 

        Mail::to($request->seller)->send(new ContactSeller($data)); 
        return redirect()->back()->with('message', 'Richiesta inviata'); 
    }
}