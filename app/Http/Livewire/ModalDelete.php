<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use LivewireUI\Modal\ModalComponent;


class ModalDelete extends ModalComponent
{

    public Announcement $announcement; 
    

    public function mount(Announcement $announcement)
    {
        $this->announcement = $announcement; 
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        // $this->loadData();
    }

    public function render()
    {
        return view('livewire.modal-delete');
    }
}
