<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditAnnouncement extends Component
{
    use WithFileUploads;
    public $announcement;
    public $temporary_images;
    public $old_images;
    public $images = [];
    protected $listeners = ['edit'];
    protected $rules = [
        'announcement.title' => 'required|max:50',
        'announcement.description' => 'required', 
        'announcement.price' => 'required',
        'announcement.category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ]; 

    protected $messages = [
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo di 1mb',
        'images.image' => 'L\'immagine deve essere un\'immagine',
        'images.max' => 'L\'immagine deve essere massimo di 1mb',
    ];

    public $category;
    public $selctedCategoryId;
    public $selectedCategoryName;

    // caricamento dell'immagine temporanea
    public function updatedTemporaryImages()
    {
        // dd('ciao');
        if ($this->validate(['temporary_images.*' => 'image|max:1024'])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->immages))) {
            unset($this->immages[$key]);
        }
    }

    // metodo rimozine immagine
    public function removeOldImage($key)
    {
        unset($this->old_images[$key]);
    }

    // metodo edit, questo mi riporta le informazioni sul mio form, per la categoria abbiamo dovuto salvare il nome e l'id separatamente
    public function edit($id)
    {
        $this->announcement = Announcement::find($id);
        $this->selctedCategoryId = $this->announcement->category->id;
        $this->selectedCategoryName = $this->announcement->category->name;
        $this->old_images = $this->announcement->images()->get();
        
        // dd($this->temporary_images);
    }

    // metodo update per aggiornare gli annunci, viene passato loadData per aggiornare automaticamente la pagina di lista annunci 
    public function update()
    {
        $this->validate();
        if($this->selctedCategoryId == $this->announcement->category->id)
        {   
            $this->announcement->is_accepted = null; 
            $this->announcement->save();
        }else{
            $this->announcement->category_id = $this->selctedCategoryId;
            $this->announcement->is_accepted = null; 
            $this->announcement->save();
        }
        $this->emitTo('announcements-list', 'loadData');
        $this->newAnnouncement();
    }


    // metodo per svuotare il form
    public function newAnnouncement()
    {
        $this->announcement = new Announcement();
        $this->selctedCategoryId = null;
    }





    public function render()
    {
        return view('livewire.edit-announcement');
    }
}
