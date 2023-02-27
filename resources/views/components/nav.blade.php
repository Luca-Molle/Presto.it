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
                        <a class="nav-link" aria-current="page"
                            href="{{ route('index.announcements') }}">Annunci</a>
                    </li>
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item dropdown dropdown-menu-end align-items-center d-flex">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
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
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class=" nav-link" href="{{ route('announcement.create') }}">Inserisci
                                        annuncio</a>
                                </li>
                                <li>
                                    <a class=" nav-link" href="{{ route('user.page') }}">I miei annunci</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="d-inline mx-2 border-0 btn maincolor text-white">Esci</button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                @endguest

                {{-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> --}}
            </div>
        </div>
    </nav>
</div>
