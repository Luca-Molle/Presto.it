<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bs-primary-text fixed-top shadow  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="contenitore-img">
                    <img src="{{ asset('img/logo.png') }}" height="35" class="me-2" alt="immagine non disponibile">
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
                    <ul class="navbar-nav  mb-2 mb-lg-0 ">
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
                </ul>

                {{-- <li class="nav-item align-items-center d-flex me-1 justify-content-center">
                    <a href="{{ route('work.with.us') }}" class="nav-link fw-bold textmain">Lavora con noi</a>
                </li> --}}
                @guest
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item align-items-center d-flex me-1 justify-content-center">
                            <a href="{{ route('work.with.us') }}"
                                class="nav-link fw-bold textmain">{{ __('ui.workWithUs') }}</a>
                        </li>

                        <li class="nav-item d-flex align-items-center ">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('ui.SignIn') }}</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        @if (Auth::user()->is_revisor)
                            <li class="nav-item align-items-center d-flex me-1 justify-content-center d-none">
                                <a href="{{ route('work.with.us') }}"
                                    class="nav-link fw-bold textmain">{{ __('ui.workWithUs') }}</a>
                            </li>
                        @else
                            <li class="nav-item align-items-center d-flex me-1 justify-content-center">
                                <a href="{{ route('work.with.us') }}"
                                    class="nav-link fw-bold textmain">{{ __('ui.workWithUs') }}</a>
                            </li>
                        @endif


                        <li class="nav-item dropdown dropdown-menu-end align-items-center ">
                            <a class="nav-link dropdown-toggle " role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span class="mx-2">

                                    {{ auth()->user()->name }}
                                </span>

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
                        @if (App\Models\Announcement::toBeRevisionedCounter() != 0)
                            {{-- <span>{{-- class=" z-n1 position-absolute top-50 start-95 translate-middle p-2 bg-danger border border-light rounded-circle" --}}
                            <li class="nav-item align-items-center d-flex">

                                <img src="{{ asset('img/notifica.png') }}" alt="logo mancante" class="img-fluid col-8">
                            </li>
                        @endif
                    </ul>
                @endguest
                {{-- selezione lingua --}}
                <ul class=" navbar-nav  mb-2 mb-lg-0  ">
                    <li class="nav-item dropdown dropdown-menu-end ">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"><img
                                src="{{ asset('img/lingua.png') }}" height="20" alt="">
                        </a>


                        <ul class="dropdown-menu dropdown-menu-center navlang object-fit-scale">
                            <li class="p-0 justify-content-end d-flex">
                                <form action="{{ route('set.language.locale', 'it') }}" method="POST">
                                    @csrf
                                    <button class="nav-link fi-it border-0 m-2 ">
                                    </button>
                                </form>
                            </li>
                            <li class="p-0 justify-content-end  d-flex">
                                <form action="{{ route('set.language.locale', 'en') }}" method="POST">
                                    @csrf
                                    <button class="nav-link fib fi-gb border-0 m-2">
                                    </button>
                                </form>
                            </li>
                            <li class="p-0 justify-content-end  d-flex">
                                <form action="{{ route('set.language.locale', 'fr') }}" method="POST">
                                    @csrf
                                    <button class="nav-link fi-fr border-0 m-2">
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>





                </ul>
            </div>
        </div>
    </nav>
</div>
