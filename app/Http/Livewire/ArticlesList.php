<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class ArticlesList extends Component
{
    public $announcements;
    protected $listeners = [
        'loadData',
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->announcements = Announcement::all();
    }

    
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        $this->loadData();
    }

    public function render()
    {
        $announcements = Announcement::all();
        return view('livewire.articles-list', compact('announcements'));
    }
}
