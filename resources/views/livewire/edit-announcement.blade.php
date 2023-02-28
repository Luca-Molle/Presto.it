<div class="container">
    <div class="row ">
        <div class="col-12 mt-5">
            <h4 class="text-center">Modifica Annuncio</h4>
            <form wire:submit.prevent="update">
                <div class="row g-3">

                    <div class="col-12">
                        @if (session()->has('message'))
                            <div class="alert alert-success mt-4">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-12">
                        <select wire:model.lazy="selctedCategoryId" class="form-select"
                            aria-label="Default select example">
                            <option value="{{ $selctedCategoryId }}">
                                @if ($selctedCategoryId == null)
                                    Categorie
                                @endif
                                {{ $selectedCategoryName }}
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="title">Titolo annuncio</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            wire:model.lazy="announcement.title">
                        <div class="col-4">
                            @error('announcement.title')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="description">Descrizione</label>
                        <textarea type="text" name="description" id="description" rows="10"
                            class="form-control @error('description') is-invalid @enderror" wire:model.lazy="announcement.description">
                        </textarea>
                        <div class="col-4">
                            @error('announcement.description')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="price">Prezzo</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror"
                            wire:model.lazy="announcement.price">
                        <div class="col-4">
                            @error('announcement.price')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-6 justify-content-start mb-2">
                        <button class="btn btn-primary" type="submit" id="userSubmitBtn">Salva</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    
</div>
