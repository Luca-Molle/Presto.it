<div class="container">
    <div class="row">
        <div class="mt-5">
            <h1 class="mt-3 textmain fw-bold">{{ __('ui.createAnnouncement') }}</h1>
            <form wire:submit.prevent="store">
                <div class=" d-flex flex-column mb-3">


                    <div class="row">



                        {{-- compilazione campi formi per creazione annuncio --}}
                        <div class="col-6">
                            <div class="col-6 mt-3 mb-2">
                                <select wire:model.defer="category" id="category" class="form-select shadow"
                                    aria-label="Default select example">
                                    <option value="">{{__('ui.textRand5')}}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="col-12">
                                    @error('category')
                                        <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- caricamento immagini --}}
                            <div class="col-12 mb-3">
                                <label for="image">{{__('ui.textRand6')}}</label>
                                <input type="file" wire:model="temporary_immages" name="immages" id="image"
                                    multiple
                                    class="form-control shadow @error('temporary_immages.*') is-invalid @enderror"
                                    placeholder="Img">
                                @error('temporary_immages.*')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                                @if (!empty($immages))
                                    <div class="row">
                                        <div class="col-12">
                                            <p>{{__('ui.preview')}}</p>
                                            <div class="row border border-4 border-info rounded shadow py-4">
                                                @foreach ($immages as $key => $immage)
                                                    <div class="col my-3">
                                                        <div class=" mx-auto shadow rounded">
                                                            <img class="img-fluid" src="{{ $immage->temporaryUrl() }}"
                                                                alt="">
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                                            wire:click="removeImage({{ $key }})">{{__('ui.buttondelete')}}</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            {{-- dati annuncio --}}
                            <div class=" mt-3">
                                <label for="title">{{__('ui.textRand7')}}</label>
                                <input type="text" name="title" id="title"
                                    class="form-control shadow @error('title') is-invalid @enderror" wire:model.lazy="title">
                                <div class="col-12">
                                    @error('title')
                                        <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class=" mt-3">
                                <label for="description">{{__('ui.textRand8')}}</label>
                                <textarea type="text" name="description" id="description" rows="10"
                                    class="form-control shadow @error('description') is-invalid @enderror" wire:model.lazy="description">
                            </textarea>
                                <div class="col-12 mt-3">
                                    @error('description')
                                        <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="price">{{__('ui.price1')}}</label>
                                <input type="number" name="price" id="price"
                                    class="form-control shadow @error('price') is-invalid @enderror" wire:model.lazy="price">
                                <div class="col-12">
                                    @error('price')
                                        <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mt-4">
                                <button class="btn btn-presto" type="submit" id="userSubmitBtn">{{__('ui.textRand9')}}</button>
                            </div>
                            <div class="col-6">
                                @if (session()->has('message'))
                                    <div class="alert alert-success mt-4">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>

                        </div>
            </form>
            {{-- Fine form inserisci annuncio --}}

            <div class="col-6">
                <div class="container text-start text-dark border border-dark-subtle rounded ">
                    <p class="fs-5 m-3 textmain fw-bold">{{ __('ui.advisesTitle') }} </a>
                    </p>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/foto.png') }}" alt="logo mancante" class="img-fluid col-2 m-3 p-2">
                        <div class="col-9">
                            <p class="col-10">
                            <p class="textmain fw-bold"> {{ __('ui.photo') }} </p>{{ __('ui.textRand10') }}</p>
                        </div>

                    </div>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/prezzo.png') }}" alt="logo mancante" class="img-fluid col-2 p-2 m-3">
                        <div class="col-9">
                            <p class="col-10">
                            <p class="textmain fw-bold"> {{ __('ui.price') }}</p>{{ __('ui.textRand11') }}</p>
                        </div>

                    </div>

                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/chiaro.png') }}" alt="logo mancante" class="img-fluid col-2 m-3 p-2">
                        <div class="col-9">
                            <p class="col-10">
                            <p class="textmain fw-bold"> {{ __('ui.description') }} </p>{{ __('ui.textRand12') }}
                            </p>
                        </div>

                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('img/messaggio.png') }}" alt="logo mancante"
                            class="img-fluid col-2 m-3 p-2">
                        <div class="col-9">
                            <p class="col-10">
                            <p class="textmain fw-bold"> {{ __('ui.mail') }}</p>{{ __('ui.textRand13') }}</p>
                        </div>

                    </div>


                </div>
            </div>

        </div>


    </div>

</div>
</div>
</div>
