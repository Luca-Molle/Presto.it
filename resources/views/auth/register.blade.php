<x-layout>

    <div class="container mt-5 ">
        <div class="d-flex justify-content-center h-250 ">
            <div class="card-header card h-100 d-inline-block">
                <h1 class="text-center">Registrati</h1>

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
                        <button type="submit" class="btn btn-primary">Registrati</button>
                    </div>
                    <div id="emailHelp" class="form-text">
                        <a class="nav-link" href="login">Accedi</a>
                    </div>
                </form>

            </div>
        </div>
    </div>



</x-layout>
