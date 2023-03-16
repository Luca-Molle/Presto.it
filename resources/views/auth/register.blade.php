<x-layout>
    <div class="d-flex justify-content-center  container textmain mb-5 d-flex align-items-stretch">
        <div class="container text-center d-flex align-items-center flex-column mt-5 w-50">
            <h1 class="pacifico">{{__('ui.welcome')}}</h1>
            <p class="fs-4 mt-3">{{__('ui.textRand21')}}</p>

            <div class="container text-start text-dark border border-dark-subtle w-75">
                <p class="fs-5 m-3">{{__('ui.textRand22')}} <a class="text-logo fs-3" href="{{ route('welcome') }}">Presto.it</a>
                </p>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/check.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> {{__('ui.easy')}} </p> {{__('ui.textRand23')}}</p>
                    </div>

                </div>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/scudo.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> {{__('ui.Sicuro')}} </p> {{__('ui.textRand24')}}</p>
                    </div>

                </div>

                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/fiducia.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> {{__('ui.Affidabile')}} </p> {{__('ui.textRand25')}}</p>
                    </div>

                </div>
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('img/eco.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> {{__('ui.Sostenibile')}} </p> {{__('ui.textRand26')}}</p>
                    </div>

                </div>


            </div>




        </div>
        <div class="w-50 d-flex justify-content-center text-dark">
            <div class="card-header card maincolor ">

                <h1 class="text-dark">{{__('ui.SignIn')}}</h1>

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
                        <label for="name" class="form-label">{{__('ui.Nome completo')}}</label>
                        <input name="name" type="text"class="form-control" id="name" aria-describedby="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email </label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="passwordInputPassword" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="passwordInputPassword1" class="form-label">{{__('ui.confPassw')}}</label>
                        <input name="password_confirmation" type="password" class="form-control"
                            id="password_confirmation">
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-presto-dark shadow  col-8">{{__('ui.SignIn')}}</button>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-12 p-3 d-flex justify-content-center row">

                            <p class=" fs-2 my-3 text-center">{{__('ui.Oppure')}}</p>


                            <div class="col-3"><a href="/auth/redirect"><img class="img-fluid"
                                        src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png"
                                        alt="icona assente"></a></div>
                            <div class="col-3"> <a href="/auth/google/login"><img class="img-fluid"
                                        src="{{ asset('img/google.png') }}" alt="icona assente"></a></div>

                        </div>


                    </div>


                    <div>

                        <p class="fs-3 mt-3 text-center">{{__('ui.textRand27')}}</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-presto-dark shadow my-3 col-6 "><a class="nav-link"
                                    href="login">Login</a></button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>


</x-layout>
