<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;

class CreateAnnouncement extends Component
{

    public $title; 
    public $description; 
    public $price; 

    protected $rules = [
        'title' => 'required',
        'description' => 'required', 
        'price' => 'required', 
    ]; 

    public function store()
    {

        $this->validate(); 

        Announcement::create([
            'title' => $this->title, 
            'description' => $this->description, 
            'price' => $this->price, 
        ]); 

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
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
