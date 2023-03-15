<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Favourites;
use Illuminate\Http\Request;

class favoritesController extends Controller
{

    public function store(Favourites $favourites, Announcement $announcement)
    {
        $favourites->announcement_id = $announcement->id;
        $favourites->setFavorite(true);
        $favourites->save();
        return redirect()->back();
    }

    public function index()
    {
        $announcements = Announcement::all();
        $favorites = Favourites::where('favorites', true)->get();
        return view('pages.favorites', compact('announcements', 'favorites'));
    }
}
