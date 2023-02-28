<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title; 
    public $description; 
    public $price; 
    public $category;

    protected $rules = [
        'title' => 'required|max:50',
        'description' => 'required|max:250', 
        'price' => 'required',
        'category' => 'required',
    ]; 

    // Fuzione che mi permette di salvare i dati
    public function store()
    {
        $this->validate(); 
        $category = Category::find($this->category);
        $announcement = $category->announcements()->create([
            'title' => $this->title, 
            'description' => $this->description, 
            'price' => $this->price, 
        ]);
        Auth::user()->announcements()->save($announcement);

        session()->flash('message', 'annuncio creato correttamente'); 
        $this->emitTo('articles-list', 'loadData');

        $this->clearInput(); 
    }

    // Controllo validazione in tempo reale 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // mwtodo per pulire i campi di input del form
    public function clearInput()
    {
        $this->title = ''; 
        $this->description = ''; 
        $this->price = '';
        $this->category = '';
    }

    // metodo che renderizza la view livewire
    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
