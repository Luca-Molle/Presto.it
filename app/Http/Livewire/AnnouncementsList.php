<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnnouncementsList extends Component
{
    public $data;

    // definizione del metodo di cancellazione di un annuncio
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        $this->loadData();
    }

    // funzione per il caricamento della modifica della colonna che mostra la tabella con tutti gli annunci
    public function loadData()
    {
        $this->data = new Announcement();
    }

    // metodo richiamato al click del bottone modifica
    public function editAnnouncement($id)
    {
        $this->emitTo('edit-announcement', 'edit', $id);
    }






    public function render()
    {
        $user = Auth::user();
        $announcements = $user->announcements;
        return view('livewire.announcements-list', compact('announcements'));
    }
}
