<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bs-primary-text fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="contenitore-img">
                    <img src="{{ asset('img/logo.png') }}" height="40" class="me-2" alt="immagine non disponibile">
                </div>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                    <li class="nav-item align-items-center d-flex me-2">
                        <a class=" text-logo fs-3 " aria-current="page" href="{{ route('welcome') }}">Presto.it</a>
                    </li>
                    <li class="nav-item align-items-center d-flex">
                        <a class="nav-link" aria-current="page" href="{{ route('index.announcements') }}">Annunci</a>
                    </li>
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item dropdown dropdown-menu-end align-items-center d-flex">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{-- OPZIONE RICHIAMO NOME CATEGORIA IN VIEW SHOWCATEGORY --}}
                                @if (Route::is('categoryShow'))
                                    {{ request()->category->name }}
                                @else
                                    Categorie
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach ($categories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('categoryShow', $category) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        {{-- <li class="nav-item mx-1 align-items-center d-flex ">
                            <x-_locale lang='en' nation='gb'/>
                        </li>
                        <li class="nav-item mx-1 align-items-center d-flex ">
                            <x-_locale lang='it' nation='it'/>
                        </li>
                        <li class="nav-item mx-1 align-items-center d-flex ">
                            <x-_locale lang='fr' nation='fr'/>
                        </li> --}}
                    </ul>
                    @guest

                        <li class="nav-item align-items-center d-flex">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                        <li class="nav-item align-items-center d-flex">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                    </ul>
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item dropdown dropdown-menu-end ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class=" nav-link" href="{{ route('announcement.create') }}">Inserisci
                                        annuncio</a>
                                </li>
                                <li>
                                    <a class=" nav-link" href="{{ route('user.page') }}">Il mio profilo</a>
                                </li>
                                @if (Auth::user()->is_revisor)
                                    <li class="nav-item">
                                        <a href="{{ route('revisor.index') }}" aria-current="page" class="nav-link">
                                            Annunci da Revisionare
                                            @if (App\Models\Announcement::toBeRevisionedCounter() === 0)
                                                <span
                                                    class="notify bg-secondary p-2 text-white">{{ App\Models\Announcement::toBeRevisionedCounter() }}
                                                </span>
                                            @else
                                                <span
                                                    class="notify bg-danger p-2 text-white">{{ App\Models\Announcement::toBeRevisionedCounter() }}
                                                </span>
                                            @endif
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="d-inline mx-2 btn btn-presto">Esci</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endguest
            </div>
        </div>
    </nav>
</div>
