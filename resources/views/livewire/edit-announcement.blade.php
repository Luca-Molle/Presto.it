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

                    <div>
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

                    <div>
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

                    <div class="col-6">
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

                    <div class="mb-6 ">
                        <button class="btn btn-presto" type="submit" id="userSubmitBtn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            @if ($selctedCategoryId == null) disabled @endif>Salva</button>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Annuncio salvato correttamente
            </div>
        </div>
    </div>
</div>
