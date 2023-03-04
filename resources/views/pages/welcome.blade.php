<x-layout>
    <div class="container-fluid">
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-success mt-5">{{ session('message') }}</div>
            @endif

            {{-- Categories Carousel --}}
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner ">
                    <div class="carousel-item active ">
                        <div class="row mx-3 justify-content-center firstcolor">
                            <x-card-carousel-category :id="1" />
                            <x-card-carousel-category :id="2" />
                            <x-card-carousel-category :id="3" />
                            <x-card-carousel-category :id="4" />
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row firstcolor mx-3 justify-content-center ">
                            <x-card-carousel-category :id="5" />
                            <x-card-carousel-category :id="6" />
                            <x-card-carousel-category :id="7" />
                            <x-card-carousel-category :id="8" />
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row firstcolor mx-3 justify-content-center ">
                            <x-card-carousel-category :id="9" />
                            <x-card-carousel-category :id="10" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev me-3" type="button" data-bs-target="#carouselExample"
            data-bs-slide="prev">
            <span class="textmain visually-hidden fw-bold">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="textmain visually-hidden fw-bold">Next</span>
        </button>
    </div>

    <div class="bg-dark text-center my-3 p-5 shadow row align-items-center">
        <div-col-12 class="col-md-6">
            <p class="pacifico fs-1 text-white">Ultimi annunci!</p>
        </div-col-12>
        <div class="col-md-6 d-flex justify-content-center">
            <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
                @csrf
                <label for="search-input"></label>
                <input type="search" name="searched" class="form-control me-2" id="search-input"
                    placeholder="Ricerca l'annuncio" aria-label="Search">
                <button type="submit" class="btn btn-presto">Cerca</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-evenly">

            {{-- Prova colonne --}}
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-5 col-lg-3 mt-4 d-flex align-self-stretch">
                    <div class="column rounded bg-white mb-4 shadow p-3">
                        <a href="{{ route('categoryShow', $announcement->category) }}" class=" btn btn-outline-presto">{{ $announcement->category->name }}</a>
                        <a href="{{ route('announcements.show', $announcement) }}"><img
                                src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-15-9520/media-gallery/black/laptop-xps-9520-t-black-gallery-4.psd?fmt=pjpg&pscan=auto&scl=1&wid=3491&hei=2077&qlt=100,1&resMode=sharp2&size=3491,2077&chrss=full&imwidth=5000"
                                class="img-fluid card-image mt-3" alt="foto"></a>
                        <div>
                            <h4 class="fw-bold">{{ $announcement->title }}</h6>
                                <h5 class="textmain fw-bold text-end">€ {{ $announcement->price }}</h5>
                                <a class="btn btn-presto shadow mt-1 d-flex justify-content-center"
                                    href="{{ route('announcements.show', $announcement) }}">Visualizza</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Versione elenco  --}}
            {{-- <div class="col-12">
                @foreach ($announcements as $announcement)
                <div class="card mx-auto m-3 card-custom d-flex col-6 shadow ">
                    <div class="row ">
                        <div class="col-6 d-flex align-items-center ">
                            <img src="https://static.fanpage.it/wp-content/uploads/sites/6/2020/04/migliori-pc-da-gaming.jpg" class="card-img-top rounded img-fluid" alt="...">
                        </div>
                        <div class="col-6">
                            <div class="card-body ">
                                <h4 class="card-title">{{ $announcement->title }}</h4>
                                <p class="card-text">{{ $announcement->price }} € </p>
                                <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-primary shadow">Visualizza</a>
                                <a href="" class="border-dark pt-2 my-2 card-link shadow btn btn-success border-top">Categoria:
                                    {{ $announcement->category->name }}</a>
                                <p class="card-footer">Pubblicato il:
                                    {{ $announcement->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
                @endforeach
            </div> --}}
        </div>

    </div>

    </div>
    </div>
</x-layout>
