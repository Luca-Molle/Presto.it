<div class="container">
    <div class="row ">
        <div class="col-12 mt-5 ">
            <h4 class="text-center fw-bold fs-2 textmain">Modifica Annuncio</h4>
            <form wire:submit.prevent="update">
                <div class="row g-3">

                    <div>
                        <select wire:model.lazy="selctedCategoryId" class="form-select" aria-label="Default select example"
                            @if ($selctedCategoryId == null) disabled @endif>
                            <option value="{{ $selctedCategoryId }}">
                                @if ($selctedCategoryId == null)
                                    Categorie
                                @else
                                    {{ $selectedCategoryName }}
                                @endif
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- ********************************************************** LAVORANDO ***************************************************************** --}}

                    <div class="col-12 mb-3">
                        <label for="image">Inserisci le tue immagini</label>
                        <input type="file" wire:model="temporary_images" name="images" id="image" multiple
                            class="form-control shadow @error('temporary_images.*') is-invalid @enderror"
                            placeholder="Img">
                        @error('temporary_images.*')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                        @if (!empty($old_images))
                            <div class="row">
                                <div class="col-12">
                                    <p>Photo preview:</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach ($old_images as $key => $image)
                                            <div class="col my-3">
                                                <div class=" mx-auto shadow rounded">
                                                    <img class="img-fluid" src="{{ $image->getUrl() }}"
                                                        alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-danger shadow d-block text-center btn-sm mt-2 mx-auto"
                                                    wire:click="removeOldImage({{ $key }})">Cancella</button>
                                            </div>
                                        @endforeach
                                        
                                            @foreach ($images as $key => $image)
                                                <div class="col my-3">
                                                    <div class=" mx-auto shadow rounded">
                                                        <img class="img-fluid" src="{{ $image->temporaryUrl() }}"
                                                            alt="">
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger shadow d-block text-center btn-sm mt-2 mx-auto"
                                                        wire:click="removeImage({{ $key }})">Cancella</button>
                                                </div>
                                            @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- ************************************************************************************************************************************** --}}
                    <div>
                        <label for="title">Titolo annuncio</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            wire:model.lazy="announcement.title">
                        <div class="col-12">
                            @error('announcement.title')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description">Descrizione</label>
                        <textarea type="text" name="description" id="description" rows="10"
                            class="form-control @error('description') is-invalid @enderror" wire:model.lazy="announcement.description">
                        </textarea>
                        <div class="col-12">
                            @error('announcement.description')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="price">Prezzo</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror"
                            wire:model.lazy="announcement.price">
                        <div class="col-12">
                            @error('announcement.price')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <button class="btn btn-presto" type="submit" id="editBtn"
                            @if ($selctedCategoryId == null) disabled @endif>Salva</button>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

{{-- Componente notifica push --}}
{{-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="editToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Conferma modifica annuncio</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hai modificato correttamente l'annuncio!
        </div>
    </div>
</div> --}}
