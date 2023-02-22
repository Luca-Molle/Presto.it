<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bs-primary-text fixed-top">
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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="register">Registrati</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                        <li>
                        @else
                            {{-- <li class="nav-item dropdown dropdown-menu-end ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">


                                <li>
                                    <a class="dropdown-item" href="{{ route('announcement.create') }}"> Inserisci
                                        annuncio</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="d-inline mx-2 border-0 bg-white">Esci</button>
                                    </form>
                                </li>
                            </ul>
                        </li> --}}


                        @endguest
                </ul>
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item dropdown dropdown-menu-end ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">


                            <li>
                                <a class="dropdown-item" href="{{ route('announcement.create') }}"> Inserisci
                                    annuncio</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="d-inline mx-2 border-0 bg-white">Esci</button>
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>

                {{-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> --}}
            </div>
        </div>
    </nav>
</div>
