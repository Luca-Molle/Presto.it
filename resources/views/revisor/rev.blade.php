<x-layout>


    <div class="container">
        <div class="d-flex align-items-center">
            {{-- CAROSELLO --}}
            <div class="col-6 col-md-7 mt-4 me-5 d-flex align-items-center">
                <div id="carouselExample" class="carousel slide mt-3">
                    @if ($announcement->images)
                        <div class="carousel-inner bg-white shadow rounded-3">
                            <div class="row">
                                @foreach ($announcement->images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class="col-12 d-flex">

                                            <div class="col-6">
                                                <img src="{{ $image->getUrl(700, 500) }}" class="img-fluid p-5"
                                                    alt="immagini">
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-2 border-bottom">
                                                    <h5 class="tc-accent mt-3 textmain fw-semibold">Tags</h5>
                                                    @if ($image->labels)
                                                        {{-- @dd($image->labels) --}}
                                                        @foreach ($image->labels as $label)
                                                            <p class="d-inline">{{ $label }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="tc-accent textmain fw-semibold">Revisione immagini</h5>
                                                    <p>Adulti: <span class="{{ $image->adult }}"></span></p>
                                                    <p>Satira: <span class="{{ $image->medical }}"></span></p>
                                                    <p>Medicina: <span class="{{ $image->spoof }}"></span></p>
                                                    <p>Violenza: <span class="{{ $image->violence }}"></span></p>
                                                    <p>Contento ammiccante: <span class="{{ $image->racy }}"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <button class="carousel-control-prev me-3" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon maincolor rounded" aria-hidden="true"></span>
                        <span class="textmain visually-hidden fw-bold">Previous</span>
                    </button>
                    <button class="carousel-control-next  " type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon maincolor rounded" aria-hidden="true"></span>
                        <span class="textmain visually-hidden fw-bold ">Next</span>
                    </button>
                </div>
            </div>
            {{-- FINE CAROSELLO --}}

            {{-- DESCRIZIONE ANNUNCIO --}}
            <div class="col-6 col-md-4 ps-3 p-3 tab-presto mt-5">
                <p class="display-2 fs-2 mt-2"><span class="textmain fw-bold">Titolo annuncio:</span>
                    {{ $announcement->title }}</p>
                {{-- <h4 class="card-title">{{ $announcement->title }}</h4> --}}
                <p class="display-2  fs-3 mt-2"><span class="textmain fw-bold">Categoria:</span>
                    {{ $announcement->category->name }}</p>



                <p class=" mt-3 fs-4"> <span class="textmain fw-bold">Prezzo </span>€ {{ $announcement->price }}
                </p>
                <h5 class="fw-bold textmain mt-3">Descrizione Annuncio: </h5>
                <p class="card-text">{{ $announcement->description }}</p>
                <p class="card-footer mt-2 "> <span class="textmain fw-bold"> Pubblicato il:</span>
                    {{ $announcement->created_at->format('d/m/Y') }}
                </p>
                <p class="card-footer fw-bold"> <span class="textmain">Venditore: </span>
                    {{ $announcement->user->name ?? '' }}</p>
                {{-- FINE DESCRIZIONE ANNUNCIO --}}



                {{-- form di accettazione / rifiuto annuncio --}}

                <div class="row mt-5">
                    <div class="col-6">
                        <form action="{{ route('revisor.accept_announcement', $announcement) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline-success">Accetta</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Rifiuta
                        </button>
                    </div>

                    {{-- Errori form rifiuto --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    {{-- COLLAPSE RIFIUTO ANNUNCIO --}}
                    <div class="collapse" id="collapseExample" class="card col-12">
                        <form action="{{ route('revisor.reject_announcement', $announcement) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="bg-white p-3 rounded mt-2 ">
                                <label for="reject_message">Messaggio di Rifiuto</label>
                                <textarea name="reject_message" id="reject_message" cols="30" rows="5" class="form-control mt-2"></textarea>
                                <button type="submit" class="btn btn-danger btn-sm mt-2" id="refuseBtn">
                                    Rifiuta
                                </button>
                            </div>
                        </form>
                    </div> 
                    {{-- FINE COLLAPSE RIFIUTO ANNUNCIO --}}  
                </div>
                </div>

            </div>


        </div>

        {{-- Altri annunci della categoria --}}
        {{-- <div class="row">
            @foreach ($category->announcements as $announcement)
                
            @endforeach
        </div> --}}

    </div>

</x-layout>
