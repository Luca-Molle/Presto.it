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
        'title' => 'required|min:4',
        'description' => 'required|max:250', 
        'price' => 'required',
        'category' => 'required',
    ]; 

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

        $this->clearInput(); 
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clearInput()
    {
        $this->title = ''; 
        $this->description = ''; 
        $this->price = '';
        $this->category = '';
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
