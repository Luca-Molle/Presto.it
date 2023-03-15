<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Favourites;
use Illuminate\Http\Request;

class favoritesController extends Controller
{
    // salvataggio per bottone salva tra i preferiti, utilizzato metodo favoriteAnn con relazione molti a molti presente nel modello User
    public function store(Announcement $announcement)
    {
        $user = auth()->user();
        $user->favoriteAnn()->detach($announcement->id);
        $user->favoriteAnn()->attach($announcement->id);
        return redirect()->back();
    }

    // passaggio dei dati alla vista i miei preferiti
    public function index()
    {
        $user = auth()->user();
        $announcements = $user->favoriteAnn()->get();
        return view('pages.favorites', compact('announcements'));
    }
}
