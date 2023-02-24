<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Presto.it</h1>
            </div>

            {{-- Carousel --}}
            
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row bg-light mx-auto ">
                            <div class="col-3 mt-5 d-flex">
                                
                            </div>
                            <div class="col-3 mt-5 d-flex">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">MARKET</h5>
                                        </h5>
                                        <p class="card-text">Compra e vendi qualisasi tipo di oggetto</p>
                                        <a href="#" class="btn btn-primary">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">LAVORO</h5>
                                        <p class="card-text">Nuove opportunità per la tua carriera</p>
                                        <a href="#" class="btn btn-primary">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex">
                                <div class="card text-center mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">IMMOBILI</h5>
                                        <p class="card-text">Trova la tua prossima casa al miglior prezzo!</p>
                                        <a href="#" class="btn btn-primary">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex">
                                <div class="card text-center mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">IMMOBILI</h5>
                                        <p class="card-text">Trova la tua prossima casa al miglior prezzo!</p>
                                        <a href="#" class="btn btn-primary">Esplora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="row justify-content-center">
                @foreach ($announcements as $announcement)
                    <div class="card mx-auto m-3 maincolor" style="width: 20rem;">
                        <img src="https://picsum.photos/200" class="card-img-top mt-3 rounded" alt="...">
                        <div class="card-body">
                            <h4 class="card-title textwhite">{{ $announcement->title }}</h4>
                            <p class="card-text textwhite">{{ $announcement->price }}</p>
                            <a href="{{ route('announcements.show', $announcement) }}"
                                class="btn btn-primary shadow">Visualizza</a>
                            <a href=""
                                class="border-dark pt-2 my-2 card-link shadow btn btn-success border-top">Categoria:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
