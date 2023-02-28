<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;

class EditAnnouncement extends Component
{
    public $announcement;
    protected $listeners = ['edit'];
    protected $rules = [
        'announcement.title' => 'required|max:15',
        'announcement.description' => 'required|max:250', 
        'announcement.price' => 'required',
        'announcement.category' => 'required',
    ]; 
    public $category;
    public $selctedCategoryId;
    public $selectedCategoryName;


    // metodo edit, questo mi riporta le informazioni sul mio form, per la categoria abbamo dovuto salvare il nome e l'id separatamente
    public function edit($id)
    {
        $this->announcement = Announcement::find($id);
        $this->selctedCategoryId = $this->announcement->category->id;
        $this->selectedCategoryName = $this->announcement->category->name;
    }

    // metodo 
    public function update()
    {
        $this->validate();
        if($this->selctedCategoryId == $this->announcement->category->id)
        {
            $this->announcement->save();
        }else{
            $this->announcement->category_id = $this->selctedCategoryId;
            $this->announcement->save();
        }
    }




    // metodo per svuotare il form
    public function newAnnouncement()
    {
        $this->announcement = new Announcement();
    }

    







    public function render()
    {
        return view('livewire.edit-announcement');
    }
}
