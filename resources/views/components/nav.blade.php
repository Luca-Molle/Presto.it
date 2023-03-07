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
                            href="{{ route('index.announcements') }}">{{ __('ui.announcementsNav') }}</a>
                    </li>
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item dropdown dropdown-menu-end align-items-center d-flex">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{-- OPZIONE RICHIAMO NOME CATEGORIA IN VIEW SHOWCATEGORY --}}
                                @if (Route::is('categoryShow'))
                                    {{ request()->category->name }}
                                @else
                                    {{ __('ui.categoriesNav') }}
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
                    <ul class=" navbar-nav  mb-2 mb-lg-0 ">
                        <li class="dropdown-menu dropdown-menu-end">
                        <li class="nav item mx-2 align-items-center d-flex">
                            <form action="{{ route('set.language.locale', 'it') }}" method="POST">
                                @csrf
                                <button class="nav-link fi-it border-0">
                                </button>
                            </form>
                        </li>
                        <li class="nav item mx-2 align-items-center d-flex">
                            <form action="{{ route('set.language.locale', 'en') }}" method="POST">
                                @csrf
                                <button class="nav-link fib fi-gb border-0">
                                </button>
                            </form>
                        </li>
                        <li class="nav item mx-2 align-items-center d-flex">
                            <form action="{{ route('set.language.locale', 'fr') }}" method="POST">
                                @csrf
                                <button class="nav-link fi-fr border-0">
                                </button>
                            </form>
                        </li>
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class=" nav-link" href="{{ route('announcement.create') }}">
                                        {{ __('ui.createAnnouncement') }}</a>
                                </li>
                                <li>
                                    <a class=" nav-link" href="{{ route('user.page') }}"> {{ __('ui.myProfile') }} </a>
                                </li>
                                @if (Auth::user()->is_revisor)
                                    <li class="nav-item">
                                        <a href="{{ route('revisor.index') }}" aria-current="page" class="nav-link">
                                            {{ __('ui.announcementsToCheck') }}
                                            @if (App\Models\Announcement::toBeRevisionedCounter() === 0)
                                                <span
                                                    class="notify bg-secondary p-2 text-white rounded-circle">{{ App\Models\Announcement::toBeRevisionedCounter() }}
                                                </span>
                                            @else
                                                <span
                                                    class="notify bg-danger p-2 text-white rounded-circle">{{ App\Models\Announcement::toBeRevisionedCounter() }}
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
                                        <button type="submit" class="d-inline mx-2 btn btn-presto">
                                            {{ __('ui.exit') }}</button>
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
