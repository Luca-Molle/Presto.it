<x-layout>


    <div class="container ">
        <div class="d-flex align-items-center">
            {{-- CAROSELLO --}}
            <div class="col-12 col-md-7 mt-4 me-5 d-flex align-items-center">
                <div id="carouselExample" class="carousel slide mt-3">
                    @if ($announcement->images)
                        <div class="carousel-inner bg-white shadow rounded-3">
                            @foreach ($announcement->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}"
                                        class="img-fluid p-5" alt="...">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <button class="carousel-control-prev me-3" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="textmain visually-hidden fw-bold">Previous</span>
                    </button>
                    <button class="carousel-control-next " type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="textmain visually-hidden fw-bold">Next</span>
                    </button>
                </div>
            </div>
            {{-- FINE CAROSELLO --}}

            {{-- DESCRIZIONE ANNUNCIO --}}
            <div class="col-12 col-md-4 ps-3 p-3 tab-presto">
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
                        <form action="{{ route('revisor.reject_announcement', $announcement) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline-danger">Rifiuta</button>
                        </form>
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
