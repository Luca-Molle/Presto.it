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

            {{-- DESCRIZIONE ANNUNCIO --}}
            <div class="col-12 col-md-4 ps-3 mt-5">
                <p class="display-2 textmain fw-bold fs-1 mt-2">{{ $announcement->title }}</p>
                {{-- <h4 class="card-title">{{ $announcement->title }}</h4> --}}
                <a href="{{ route('categoryShow', $announcement->category) }}"
                    class=" pt-2 my-2shadow btn btn-outline-presto d-flex justify-content-center">Categoria:
                    {{ $announcement->category->name }}</a>
                <p class="fw-bold mt-3 fs-4">€ {{ $announcement->price }}</p>
                <h5 class="fw-bold mt-3">Descrizione Annuncio: </h5>
                <p class="card-text">{{ $announcement->description }}</p>
                <p class="card-footer mt-2">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                <p class="card-footer fw-bold">Venditore: {{ $announcement->user->name ?? '' }}</p>
                {{-- FINE DESCRIZIONE ANNUNCIO --}}

                {{-- FORM COLLAPSE CONTATTO VENDITORE  --}}
                <button class="btn btn-presto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Contatta il venditore</button>

                {{-- SEZIONE ALERT ERROR/SUCCESS --}}
                @if (session()->has('message'))
                <div class="alert alert-success mt-2">{{ session('message') }}</div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
                @endif
                {{-- FINE SEZIONE ALERT ERROR/SUCCESS --}}

                <div class="collapse my-3" id="collapseExample">
                    <div class="card card-body">
                        <form action="/richiesta/info/annuncio" class="column g-3" method="POST">
                        @csrf
                            <div class="col-12 mt-2">
                                <input type="text" id="title" name="title" hidden value="{{ $announcement->title }}">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="email" id="seller" name="seller" hidden value="{{ $announcement->user->email }}">
                            </div>

                            <div class="col-12 mt-2">
                                <input type="text" id="name" name="name" class="form-control" 
                                @if (auth()->user())
                                    value="{{ auth()->user()->name }}"
                                @else
                                    placeholder="Nome"
                                @endif
                                >
                            </div>

                            <div class="col-12 mt-2">
                                <input type="email" id="email" name="email" class="form-control"
                                @if (auth()->user())
                                    value="{{ auth()->user()->email }}"
                                @else
                                    placeholder="E-mail"
                                @endif
                                >
                            </div>

                            <div class="col-12 mt-2">
                                <textarea name="message" id="" cols="30" rows="3" placeholder="Mesaggio al venditore" class="form-control"></textarea>
                            </div>

                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-presto">Invia</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- FINE FORM COLLAPSE CONTATTO VENDITORE --}}

            </div>

            
        </div>

        {{-- Altri annunci della categoria --}}
        {{-- <div class="row">
            @foreach ($category->announcements as $announcement)
                
            @endforeach
        </div> --}}

    </div>
</x-layout>
