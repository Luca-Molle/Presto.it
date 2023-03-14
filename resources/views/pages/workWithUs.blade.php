<x-layout>
    <div class="d-flex justify-content-center  container textmain mb-5 d-flex align-items-stretch">

        <div class="container text-center d-flex align-items-center flex-column mt-5 w-50">
            <p class="fs-4 mt-3">Siamo alla ricerca di nuovi collaboratori</p>
            <h1 class="pacifico">Lacora con noi!</h1>

            <p class="fs-5 m-3">Entra in <a class="text-logo fs-2" href="{{ route('welcome') }}">Presto.it</a>
            </p>
            <div class="container text-start text-dark w-75 fs-4">
                </p> Revisona gli annunci</p>
                </p> Ti basta uno smartphone e una connessione</p>
                </p> 100 % da remoto</p>


                <div class="d-flex align-items-center">




                </div>
                <div class="d-flex align-items-center mb-3">

                    <div class="col-9">
                        <p class="col-10">
                        <p class="fw-bold"> Non perdere questa occasione! </p> Invia subito la tua candidatura </p>
                    </div>
                    <img src="{{ asset('img/freccia.png') }}" alt="logo mancante" class="img-fluid col-2 m-3">
                </div>


            </div>




        </div>
        <div class="w-50 d-flex justify-content-center text-dark mt-5">
            <div class="card-header card maincolor w-100">

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

                    <div class="col-6 ">
                        <img src="{{ asset('img/lavoro.png') }}" alt="logo mancante" class="img-fluid">
                    </div>
                </div>
                <form action="{{ route('become.revisor') }}" method="POST" class=" g-3">
                    @csrf
                    <div class="container">
                        <div class="row justify-content-center">


                            @if (session()->has('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <div class="col-12 my-2">
                                <label for="name" class="fs-4">Nome</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    @if (auth()->user()) value="{{ auth()->user()->name }}"
                                @else
                                    placeholder="Nome" @endif>
                            </div>
                            <div class="col-12 my-2">
                                <label for="email" class="fs-4">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    @if (auth()->user()) value="{{ auth()->user()->email }}"
                                @else
                                    placeholder="E-mail" @endif>
                            </div>
                            <div class="col-12 my-2">
                                <label for="message" class="fs-4">Parlaci di te!</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <button type="submit" class=" btn btn-presto-dark my-2 p-2 w-75">Invia</button>


                        </div>
                    </div>
                </form>
            </div>

        </div>

</x-layout>
