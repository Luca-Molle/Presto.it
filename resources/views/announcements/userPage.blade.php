<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="Col-10 col-lg-8">
                <h1 class="textmain fw-bold pt-5">Il tuo profilo</h1>
                <p class="fs-2">Il tuo spazio per gestire gli annunci e le tue informazioni</p>
                <a class="btn btn-sm btn-presto" href="{{ route('favorites.show') }}">Preferiti</a>
                <a class="btn btn-sm btn-presto" href="{{ route('announcement.create') }}">Inserisci nuovo anuncio</a>
                @if (Auth::user()->is_revisor)
                    <a class="btn btn-sm btn-presto" href="{{ route('revisor.index') }}">Pannello del revisore</a>
                @else
                    <a class="btn btn-sm btn-presto" href="{{ route('work.with.us') }}">Lavora con noi </a>
                @endif

            </div>
            <div class="col-2 m-5">
                <a data-bs-toggle="collapse" href="#collapseProfileImage" role="button" aria-expanded="false"
                    aria-controls="collapseProfileImage">
                    @if (auth()->user()->profile_image)
                        <img src="{{ Storage::url(auth()->user()->profile_image) }}" class='img-fluid' alt="avatar">
                    @else
                        <img class="img-fluid avatar2" src="{{ Avatar::create(auth()->user()->name)->toBase64() }} "
                            alt="default">
                    @endif

                </a>
                {{-- Collapse modifica immagine profilo --}}
                <div class="col-12 collapse" id="collapseProfileImage">
                    <form action="{{ route('user.profile.image.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label for="image" class="mt-2">Seleziona immagine</label>
                        <input type="file" name="image" id="image" class="form-control shadow mt-2">
                        <button type="submit" class="btn btn-sm btn-presto mt-2">
                            Salva
                        </button>
                    </form>
                </div>
                {{-- Fine collapse modifica immagine profilo --}}
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p class="fs-3 text-center mt-2">Ciao <span class="fw-bold">{{ $users->name }}</span>, ecco il tuo
                    profilo
                </p>
            </div>

            @if (!($users->address && $users->city && $users->phone && $users->site))
                <div class="col-12 text-center">
                    <p class="fs-5 text-center">Completa il tuo profilo! Fatti conoscere ai tuoi possibili acquirenti!
                    </p>
                </div>
            @else
                <div class="col-12 text-center">
                    <p class="fs-5 text-center text-success">Profilo completo!</p>
                </div>
            @endif

            @if (session()->has('success'))
                <div class=" col-3 alert alert-success mt-2 mx-auto text-center">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="col-3 alert alert-danger mt-2 mx-auto text-center">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                <div class="row col-12 justify-content-center">
                    <div class="col-12 col-lg-5 m-2">
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Nome completo</label>
                            <input disabled name="name" type="text" class="form-control" id="name"
                                aria-describedby="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Indirizzo</label>
                            <input name="address" type="text" class="form-control"
                                @if (auth()->user()->address) value="{{ auth()->user()->address }}"
                            @else
                                placeholder="Indirizzo" @endif>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Numero di telefono</label>
                            <input name="phone" type="text" class="form-control"
                                @if (auth()->user()->phone) value="{{ auth()->user()->phone }}"
                            @else
                                placeholder="Telefono" @endif>
                        </div>

                    </div>
                    <div class="col-12 col-lg-5 m-2">

                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Email address</label>
                            <input disabled name="email" type="email" class="form-control" id="exampleInputEmail"
                                aria-describedby="emailHelp" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Città</label>
                            <input name="city" type="text" class="form-control"
                                @if (auth()->user()->city) value="{{ auth()->user()->city }}"
                            @else
                                placeholder="Città" @endif>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Web Site</label>
                            <input name="site" type="text" class="form-control"
                                @if (auth()->user()->site) value="{{ auth()->user()->site }}"
                            @else
                                placeholder="Sito web" @endif>
                        </div>
                        <div class=" mt-4 justify-content-end d-flex">
                            <button class="btn btn-presto" type="submit" id="userSubmitBtn">Salva</button>
                        </div>
                    </div>
                </div>
            </form>

            {{-- <div class=" d-flex mt-4">
                <a href="/forgot-password"><button class=" btn btn-presto">Reset password</button></a>
            </div> --}}

        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-5 mx-3" id="editForm">
                <livewire:edit-announcement />
            </div>
            <div class="col-12 col-lg-6 mx-3 mb-3 ">
                <livewire:announcements-list />
            </div>
        </div>
    </div>

</x-layout>
