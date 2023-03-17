<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisioneLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Facades\File;
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
        if ($this->validate(['temporary_images.*' => 'image|max:1024'])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
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
        if ($this->selctedCategoryId == $this->announcement->category->id) {
            $this->announcement->is_accepted = null;
            $this->storeImage();
            $this->announcement->save();
        } else {
            $this->announcement->category_id = $this->selctedCategoryId;
            $this->announcement->is_accepted = null;
            $this->storeImage();
            $this->announcement->save();
        }

        $this->emitTo('announcements-list', 'loadData');
        $this->newAnnouncement();
        return redirect()->route('user.page');
    }


    // metodo per svuotare il form
    public function newAnnouncement()
    {
        $this->announcement = new Announcement();
        $this->selctedCategoryId = null;
    }


    public function storeImage()
    {
        // metodo per sostituire l'immagine
        $imgsToDelete = $this->announcement->images()->get()->diff($this->old_images);
        foreach ($imgsToDelete as $img) {
            $img->delete();
        }
            if (count($this->images)) {
                // dd('ciao');
                foreach ($this->images as $key => $image) {
                    $newFileName = "announcements/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);
                    // chiedere perchè mi fa il resize dell'immagne tagliando il tradeMark
                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path, 700, 500),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisioneLabelImage($newImage->id),
                    ])->dispatch($newImage->id);
                }
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
    }


    public function render()
    {
        return view('livewire.edit-announcement');
    }
}
