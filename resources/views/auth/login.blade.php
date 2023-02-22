<x-layout>

    <div class="container mt-5 ">
        <div class="d-flex justify-content-center h-100 ">
            <div class="card-header card ">

                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>

                <h1 class="fw-bold">Login</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="Email"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                        <div id="emailHelp" class="form-text">
                            <a class="nav-link" href="register">Non sei ancora registrato?</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="row justify-content align-items-center remember">
                        <input name="remember" type="checkbox" class="form-check col-2" id="exampleCheck1">
                        <label class="form-check-label col-10 " for="exampleCheack1">Remember</label>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn float-right btn-primary col-3 ">Login</button>
                    </div>

                </form>



            </div>
        </div>
    </div>

</x-layout>
