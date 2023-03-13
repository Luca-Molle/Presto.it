<footer id="sticky-footer" class="flex-shrink-0 d-flex py-4 bg-dark text-white-50">

    <div class="container">
        <div class="row">
            <div class="container col-6  ">
                <div class="row">
                    <div class="col-6 ">

                        <p><a class="textmain nav-link fw-bold" href="{{ route('welcome') }}">Home</a></p>
                        <p> <a class="textmain nav-link fw-bold"
                                href="{{ route('index.announcements') }}">{{ __('ui.announcementsNav') }}</a>
                        </p>
                        @guest
                            <a href="{{ route('work.with.us') }}"
                                class="nav-link fw-bold textmain">{{ __('ui.workWithUs') }}</a>
                        @else
                            @if (Auth::user()->is_revisor)
                                <p>
                                    <a href="{{ route('work.with.us') }}"
                                        class="nav-link fw-bold textmain d-none">{{ __('ui.workWithUs') }}</a>
                                </p>
                            @else
                                <a href="{{ route('work.with.us') }}"
                                    class="nav-link fw-bold textmain">{{ __('ui.workWithUs') }}</a>
                            @endif
                        @endguest
                    </div>
                    <div class="col-6 text-center justify-content-center row">
                        <p class="textmain nav-link fw-bold fs-5">Seguici sui social</p>
                        <div class="col-3"><a href="#"><i class="bi bi-instagram text-white fs-3"></i></a></div>
                        <div class="col-3"><a href="#"><i class="bi bi-facebook text-white fs-3"></i></a></div>
                        <div class="col-3"><a href="#"><i class="bi bi-tiktok text-white fs-3"></i></a></div>
                    </div>
                </div>



            </div>
            {{-- <div class="col-6">
                <li class="nav-item align-items-center d-flex me-1 justify-content-center">
                    <a href="{{ route('work.with.us') }}" class="nav-link fw-bold textmain">Lavora con noi</a>
                </li>
            </div> --}}
            <div class="textmain text-center col-6 ">
                <small class="fs-4">Copyright {{ date('y') }}&copy; Presto.it</small>
                <div class="row fs-6">
                    <p>Developed by
                    </p>
                    <div class="col-6">
                        <a class="text-white " href="https://www.linkedin.com/in/andrea-nicoletti-197439266/">Andrea
                            Nicoletti</a>
                    </div>
                    <div class="col-6">
                        <a class="text-white " href="https://www.linkedin.com/in/luca-molle/">Luca Molle</a>
                    </div>
                    <div class="col-6">
                        <a class="text-white " href="https://www.linkedin.com/in/difino/">Francesco Emanuel
                            Difino</a>
                    </div>
                    <div class="col-6">
                        <a class="text-white " href="https://www.linkedin.com/in/giuseppe-mottola-7b917b203/">Giuseppe
                            Mottola</a>
                    </div>
                </div>














            </div>
        </div>
    </div>

</footer>
