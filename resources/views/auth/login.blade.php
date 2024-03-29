<x-layout>

    <div class="d-flex justify-content-center  container textmain mb-5 ">
        <div class="container text-center d-flex align-items-center flex-column mt-5 w-50">
            <h1 class="mx-auto pacifico">{{__('ui.welcome')}}</h1>
            <p class="fs-2 mt-auto">{{__('ui.textRand16')}} <span class="fw-bold">Login</span> a <a class="text-logo fs-3"
                    href="{{ route('welcome') }}">Presto.it</a> <br>{{__('ui.textRand17')}}
            </p>
            <p class="fs-3 mt-3">{{__('ui.textRand18')}}</p>
            <p class="fs-4 ">{{__('ui.textRand19')}}</p>
            <div class=" d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-presto shadow "><a class="nav-link"
                        href="{{ route('register') }}">{{__('ui.SignIn')}}</a></button>
            </div>
            {{-- <h1 class="fw-bold fs-1">Login</h1> --}}
            <div class="row mx-5 my-auto text-center w-50 p-2 justify-content-center ">
                <p class="fs-3">{{__('ui.textRand20')}}</p>
                <div class="col-3"><a href="/auth/redirect"><img class="img-fluid"
                            src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png"
                            alt="icona assente"></a></div>
                <div class="col-3"> <a href="/auth/google/login"><img class="img-fluid"
                            src="{{ asset('img/google.png') }}" alt="icona assente"></a></div>
            </div>
        </div>
        <div class="w-50 d-flex justify-content-center">
            <div class="card-header card maincolor">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="row justify-content-center">
                    <div class="col-8">
                        <img src="{{ asset('img/login.png') }}" alt="logo mancante" class="img-fluid">
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fs-4">Email</label>
                        <input name="email" type="email" class="form-control" id="Email"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                        {{-- <div id="emailHelp" class="form-text">
                            <a class="nav-link" href="register">Non sei ancora registrato?</a>
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fs-4">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                        <div class="form-text">
                            <a class="nav-link" href="/forgot-password"></a>
                        </div>
                    </div>
                    <div class="row justify-content align-items-center remember">
                        <input name="remember" type="checkbox" class="form-check col-2" id="exampleCheck1">
                        <label class="form-check-label col-10 " for="exampleCheack1">Remember</label>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-presto-dark shadow my-3 col-3 ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
