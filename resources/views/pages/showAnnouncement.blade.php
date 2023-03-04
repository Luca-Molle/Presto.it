<x-layout>
    {{-- <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5 mt-5  text-center">
                <h1 class="display-2 text-dark text-white">Annuncio {{ $announcement->title }}</h1>
            </div>
        </div>
    </div> --}}

    <div class="container">
        <div class="row justify-content-evenly">
            {{-- CAROSELLO --}}
            <div class="col-12 col-md-7 mt-5 me-5 d-flex align-items-center">
                <div id="carouselExample" class="carousel slide mt-3">
                    <div class="carousel-inner bg-white shadow rounded-3">
                        <div class="carousel-item active">
                            <img src="http://www.autocentroarzignano.it/wp-content/uploads/2021/11/IMG_6937-min.jpg"
                                class="img-fluid p-5" alt="...">
                        </div>
                        <div class="carousel-item ">
                            <img src="http://www.autocentroarzignano.it/wp-content/uploads/2021/11/IMG_6938-min.jpg"
                                class="img-fluid p-5" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://www.autocentroarzignano.it/wp-content/uploads/2021/11/IMG_6943-min.jpg"
                                class="img-fluid p-5" alt="...">
                        </div>
                    </div>
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

            {{-- Descrizione annuncio --}}
            <div class="col-12 col-md-4 ps-3 mt-5">
                <h1 class="display-2 textmain fw-bold">{{ $announcement->title }}</h1>
                {{-- <h4 class="card-title">{{ $announcement->title }}</h4> --}}
                <a href="##"
                    class=" pt-2 my-2shadow btn btn-outline-presto d-flex justify-content-center">Categoria:
                    {{ $announcement->category->name }}</a>
                <h3 class="fw-bold mt-3">€ {{ $announcement->price }}</h3>
                <h5 class="fw-bold mt-3">Descrizione Annuncio: </h5>
                <p class="card-text">{{ $announcement->description }}</p>
                <p class="card-footer mt-2">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                <p class="card-footer fw-bold">Autore: {{ $announcement->user->name ?? '' }}</p>
                <a href="#" class="btn btn-presto">Contatta il venditore</a>
            </div>
            {{-- Fine descrizione annuncio --}}
        </div>

        <div class="row">
            {{-- @foreach ($category->announcements as $announcement)
                
            @endforeach --}}
        </div>

    </div>
</x-layout>
