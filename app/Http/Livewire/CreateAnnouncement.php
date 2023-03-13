<?php

namespace App\Http\Livewire;

use App\Jobs\AddWatermarkPresto;
use App\Jobs\GoogleVisioneLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category;
    public $message;
    public $immages = [];
    public $temporary_immages;
    public $announcement;


    protected $rules = [
        'title' => 'required|max:50',
        'description' => 'required|max:250',
        'price' => 'required',
        'category' => 'required',
        'immages.*' => 'image|max:1024',
        'temporary_immages.*' => 'image|max:1024'
    ];

    protected $messages = [
        'temporary_immages.required' => 'L\'immagine è richiesta',
        'temporary_immages.*.image' => 'I file devono essere immagini',
        'temporary_immages.*.max' => 'L\'immagine deve essere massimo di 1mb',
        'immages.image' => 'L\'immagine deve essere un\'immagine',
        'immages.max' => 'L\'immagine deve essere massimo di 1mb',
    ];

    public function updatedTemporaryImmages()
    {
        if ($this->validate(['temporary_immages.*' => 'image|max:1024'])) {
            foreach ($this->temporary_immages as $image) {
                $this->immages[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->immages))) {
            unset($this->immages[$key]);
        }
    }

    // Fuzione che mi permette di salvare i dati
    public function store()
    {
        $this->validate();
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->immages)) {
            foreach ($this->immages as $key => $image) {
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                // chiedere perchè mi fa il resize dell'immagne tagliando il tradeMark
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 700, 500),
                    new AddWatermarkPresto($newImage->id),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisioneLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        Auth::user()->announcements()->save($this->announcement);
        session()->flash('message', 'Annuncio creato correttamente!');

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
        $this->immages = [];
        $this->temporary_immages = [];
    }

    // metodo che renderizza la view livewire
    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
