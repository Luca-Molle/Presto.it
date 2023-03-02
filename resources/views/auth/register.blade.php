<x-layout>
    <div class="d-flex justify-content-center  container textmain mb-5 d-flex align-items-stretch">
        <div class="container text-center d-flex align-items-center flex-column mt-5 w-50">
            <h1 class="pacifico">Benvenuto!</h1>
            <p class="fs-4 mt-3">Crea il tuo account per iniziare a vendere e comprare in tutta Italia</p>

            <div class="container text-start text-dark border border-dark-subtle w-75">
                <p class="fs-5 m-3">I vantaggi di <a class="text-logo fs-3" href="{{ route('welcome') }}">Presto.it</a>
                </p>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/check.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> Semplice </p> Rispondi ad un annuncio con un click o chiama direttamente il
                        venditore</p>
                    </div>

                </div>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/scudo.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> Sicuro </p> Consulti solo annunci che sono stati controllati prima della
                        pubblicazione</p>
                    </div>

                </div>

                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/fiducia.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> Affidabile </p> Puoi vedere le recensioni e lasciare i tuoi feedback</p>
                    </div>

                </div>
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('img/eco.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> Sostenibile </p> Comprando e vendendo usato ci guadagni tu e anche il
                        pianeta</p>
                    </div>

                </div>


            </div>




        </div>
        <div class="w-50 d-flex justify-content-center text-dark">
            <div class="card-header card maincolor ">

                <h1 class="text-dark">Registrati</h1>

                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome completo</label>
                        <input name="name" type="text"class="form-control" id="name" aria-describedby="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="passwordInputPassword" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="passwordInputPassword1" class="form-label">Conferma Password</label>
                        <input name="password_confirmation" type="password" class="form-control"
                            id="password_confirmation">
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-outline-secondary shadow  col-8">Registrati</button>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-12 p-3 d-flex justify-content-center row">

                            <p class=" fs-2 my-3 text-center">Oppure</p>


                            <div class="col-3"><a href="/auth/redirect"><img class="img-fluid"
                                        src="{{ asset('img/linkedin.png') }}" alt="icona assente"></a></div>
                            <div class="col-3"> <a href="#"><img class="img-fluid"
                                        src="{{ asset('img/google.png') }}" alt="icona assente"></a></div>
                            <div class="col-3"> <a href="#"><img class="img-fluid"
                                        src="{{ asset('img/Fb.png') }}" alt="icona assente"></a>
                            </div>
                        </div>


                    </div>


                    <div>

                        <p class="fs-3 mt-3 text-center">Hai già un account?</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-outline-secondary shadow my-3 col-6 "><a
                                    class="nav-link" href="login">Accedi</a></button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>


</x-layout>
