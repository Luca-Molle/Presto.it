<x-layout>
    <div class="container">
        <div class="row justify-content-evenly mb-5">
            {{-- CAROSELLO --}}
            <div class="col-12 col-md-7 mt-4 me-5">
                <div id="carouselExampleIndicators" class="carousel slide mt-3 sticky-top">
                    @if ($announcement->images)
                        <div class="carousel-inner bg-white shadow rounded-3">
                            @foreach ($announcement->images as $image)
                                {{-- @dd($announcement->images) --}}
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(700, 500) }}" class="img-fluid p-5" alt="immagini">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon maincolor rounded" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon maincolor rounded" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            {{-- FINE CAROSELLO --}}

            {{-- DESCRIZIONE ANNUNCIO --}}


            <div class="col-12 col-md-4 ps-3 mt-5">
                <div class="container">
                    <div class="row align-items-start">
                        <p class="display-2 textmain fw-bold fs-1 col-10">{{ $announcement->title }}</p>

                        @if (!auth()->user())
                            <div class="col-2">
                                <button type="submit" class="btn btn-outline-danger shadow "><a class="nav-link"
                                        href="{{ route('login') }}"><i class="bi bi-heart"></i></a></button>
                            </div>
                        @else
                            @if (count($data) > 0)
                                <form class="col-2 " action="{{ route('delete.favorite', $announcement) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-heart"></i>
                                    </button>
                                </form>
                            @else
                                <form class="col-2" action="{{ route('add.favorite', $announcement) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="bi bi-heart"></i>
                                    </button>
                                </form>
                            @endif
                        @endif


                    </div>


                </div>

                {{-- <h4 class="card-title">{{ $announcement->title }}</h4> --}}
                <a href="{{ route('categoryShow', $announcement->category) }}"
                    class=" pt-2 my-2shadow btn btn-outline-presto d-flex justify-content-center">
                    {{ $announcement->category->name }}</a>
                <p class="fw-bold mt-3 fs-4">€ {{ $announcement->price }}</p>
                <h5 class="fw-bold mt-3">Descrizione Annuncio: </h5>
                <p class="card-text">{{ $announcement->description }}</p>
                <p class="card-footer mt-2">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                {{-- inserire sito web e foto utente --}}
                <p class="card-footer btn d-flex justify-content-start align-items-center ">Venditore: <span
                        class="text-decoration-underline fw-bold " type="button" data-bs-toggle="collapse"
                        data-bs-target="#info" aria-expanded="false" aria-controls="info">
                        {{ $announcement->user->name }}</span>
                    <span><img
                            @if (!$announcement->user->profile_image) src="{{ Avatar::create($announcement->user->name)->toBase64() }} "
                        @else
                            src="{{ Storage::url($announcement->user->profile_image) }}" @endif
                            class="avatar " alt="">
                    </span>
                </p>


                {{-- FINE DESCRIZIONE ANNUNCIO --}}

                {{-- COLLAPSE INFO VENDITORE --}}
                <div class="collapse my-3 " id="info">
                    <div class="card w-75 tab-presto  ">
                        <p class="mx-2 mt-2 fw-bold"> Info Venditore</p>
                        @if ($announcement->user->address)
                            <p class="mx-2"> Address: <span
                                    class="textmain d-flex justify-content-end fw-bold mx-2">{{ $announcement->user->address }}</span>
                            </p>
                        @endif

                        @if ($announcement->user->city)
                            <p class="mx-2">City:<span
                                    class="textmain d-flex justify-content-end fw-bold mx-2">{{ $announcement->user->city }}</span>
                            </p>
                        @endif

                        <p class="mx-2">e-mail:<span
                                class="textmain d-flex justify-content-end fw-bold mx-2">{{ $announcement->user->email }}</span>
                        </p>

                        @if ($announcement->user->phone)
                            <p class="mx-2">Phone Number:<span
                                    class="textmain d-flex justify-content-end fw-bold mx-2">{{ $announcement->user->phone }}</span>
                            </p>
                        @endif

                        @if ($announcement->user->site)
                            <p class="mx-2">Web Site:<span class=" d-flex justify-content-end fw-bold mx-2"><a
                                        class="textmain" href="{{ $announcement->user->site }}">
                                        {{ $announcement->user->site ?? '' }}</a></span>
                            </p>
                        @endif


                    </div>
                </div>
                {{-- FINE COLLAPSE INFO VENDITORE --}}

                {{-- TAG CITTA' --}}
                @if ($announcement->user->city)
                    <p class="card-footer "><img class="img-fluid" src="{{ asset('img/local.png') }}" alt="img error">
                        {{ $announcement->user->city }}
                    </p>
                @endif
                {{-- FINE TAG CITTA' --}}

                {{-- FORM COLLAPSE CONTATTO VENDITORE  --}}
                <div class="col-12">
                    <button class="btn btn-presto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Contatta
                        il
                        venditore
                    </button>
                </div>

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
                    <div class="card card-body tab-presto  ">
                        <form action="/richiesta/info/annuncio" class="column g-3" method="POST">
                            @csrf
                            <div class="col-12 mt-2">
                                <input type="text" id="title" name="title" hidden
                                    value="{{ $announcement->title }}">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="email" id="seller" name="seller" hidden
                                    value="{{ $announcement->user->email }}">
                            </div>

                            <div class="col-12 mt-2">
                                <input type="text" id="name" name="name" class="form-control"
                                    @if (auth()->user()) value="{{ auth()->user()->name }}"
                                @else
                                    placeholder="Nome" @endif>
                            </div>

                            <div class="col-12 mt-2">
                                <input type="email" id="email" name="email" class="form-control"
                                    @if (auth()->user()) value="{{ auth()->user()->email }}"
                                @else
                                    placeholder="E-mail" @endif>
                            </div>

                            <div class="col-12 mt-2">
                                <textarea name="message" id="" cols="30" rows="3" placeholder="Mesaggio al venditore"
                                    class="form-control"></textarea>
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
