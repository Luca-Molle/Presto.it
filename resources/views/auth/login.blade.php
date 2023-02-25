<x-layout>

    <div class="container mt-5 ">
        <div class="d-flex justify-content-center h-100 ">
            <div class="card-header card second-color ">

                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="container text-center ">
                    <h1>Benvenuto!</h1>
                    <p class="fs-5">Effettua il <span class="fw-bold">Login</span> per accedere ai contenuti!
                    </p>
                    {{-- <h1 class="fw-bold fs-1">Login</h1> --}}


                </div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf


                    <div class="mb-3">
                        <label for="email" class="form-label fs-4">Email address</label>
                        <input name="email" type="email" class="form-control" id="Email"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                        <div id="emailHelp" class="form-text">
                            <a class="nav-link" href="register">Non sei ancora registrato?</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fs-4">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                        <div class="form-text">
                            <a class="nav-link" href="/forgot-password">Forgot password?</a>
                        </div>
                    </div>
                    <div class="row justify-content align-items-center remember">
                        <input name="remember" type="checkbox" class="form-check col-2" id="exampleCheck1">
                        <label class="form-check-label col-10 " for="exampleCheack1">Remember</label>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn float-right btn-outline-secondary col-3 ">Login</button>
                    </div>

                </form>
                <div class="row mx-5 my-3 text-center">
                    <p class="fs-5">or Login with</p>
                    <div class="col"><a href="#"><img class="img-fluid" src="{{ asset('img/linkedin.png') }}"
                                alt="icona assente"></a></div>
                    <div class="col"> <a href="#"><img class="img-fluid" src="{{ asset('img/google.png') }}"
                                alt="icona assente"></a></div>
                    <div class="col"> <a href="#"><img class="img-fluid" src="{{ asset('img/Fb.png') }}"
                                alt="icona assente"></a>
                    </div>
                </div>



            </div>
        </div>
    </div>

</x-layout>
