<x-layout>
    <div class="container-fluid">
        <div class="row">


            {{-- Carousel --}}

            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner ">
                    <div class="carousel-item active ">
                        <div class="row mx-3 justify-content-center firstcolor">

                            <div class="col-3 mt-5 d-flex card-custom " style="width: 18rem">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">MARKET</h5>
                                        </h5>
                                        <p class="card-text">Compra e vendi qualisasi tipo di oggetto</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex card-custom" style="width: 18rem">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">LAVORO</h5>
                                        <p class="card-text">Nuove opportunità per la tua carriera</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex card-custom" style="width: 18rem">
                                <div class="card text-center mb-3 category-card maincolor text-white">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">IMMOBILI</h5>
                                        <p class="card-text">Trova la tua prossima casa al miglior prezzo!</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex card-custom" style="width: 18rem">
                                <div class="card text-center mb-3 category-card maincolor text-white">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">MOTORI</h5>
                                        <p class="card-text">Migliaia di annunci per la tua passione!</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row firstcolor mx-3 justify-content-center ">

                            <div class="col-3 mt-5 d-flex card-custom " style="width: 18rem">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">MARKET</h5>
                                        </h5>
                                        <p class="card-text">Compra e vendi qualisasi tipo di oggetto</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex card-custom" style="width: 18rem">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">LAVORO</h5>
                                        <p class="card-text">Nuove opportunità per la tua carriera</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex card-custom" style="width: 18rem">
                                <div class="card text-center mb-3 category-card maincolor text-white">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">IMMOBILI</h5>
                                        <p class="card-text">Trova la tua prossima casa al miglior prezzo!</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex card-custom" style="width: 18rem">
                                <div class="card text-center mb-3 category-card maincolor text-white">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">MOTORI</h5>
                                        <p class="card-text">Migliaia di annunci per la tua passione!</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row firstcolor mx-3 justify-content-center ">

                            <div class="col-3 mt-5 d-flex card-custom " style="width: 18rem">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">MARKET</h5>
                                        </h5>
                                        <p class="card-text">Compra e vendi qualisasi tipo di oggetto</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mt-5 d-flex card-custom" style="width: 18rem">
                                <div class="card text-center maincolor text-white mb-3 category-card">
                                    <div class="card-body">
                                        <h5 class="card-title category-logo ">LAVORO</h5>
                                        <p class="card-text">Nuove opportunità per la tua carriera</p>
                                        <a href="#" class="btn border">Esplora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev me-3 " type="button" data-bs-target="#carouselExample"
                data-bs-slide="prev">
                <span class="textmain visually-hidden fw-bold">Previous</span>
            </button>
            <button class="carousel-control-next " type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="textmain visually-hidden fw-bold">Next</span>
            </button>
        </div>

        <div class="second-color text-center my-3 p-5 ">
            <p class="text-logo fs-1">Ultimi annunci!</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach ($announcements as $announcement)
                        <div class="card mx-auto m-3 card-custom d-flex col-6 ">
                            <div class="row ">
                                <div class="col-6 d-flex align-items-center ">
                                    <img src="https://static.fanpage.it/wp-content/uploads/sites/6/2020/04/migliori-pc-da-gaming.jpg"
                                        class="card-img-top rounded img-fluid" alt="...">
                                </div>
                                <div class="col-6">
                                    <div class="card-body ">
                                        <h4 class="card-title">{{ $announcement->title }}</h4>
                                        <p class="card-text">{{ $announcement->price }} € </p>
                                        <a href="{{ route('announcements.show', $announcement) }}"
                                            class="btn btn-primary shadow">Visualizza</a>
                                        <a href=""
                                            class="border-dark pt-2 my-2 card-link shadow btn btn-success border-top">Categoria:
                                            {{ $announcement->category->name }}</a>
                                        <p class="card-footer">Pubblicato il:
                                            {{ $announcement->created_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    </div>
</x-layout>
