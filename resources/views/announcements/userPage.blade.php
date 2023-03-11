<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="Col-10 col-lg-8">
                <h1 class="textmain fw-bold pt-5">Il tuo profilo</h1>
                <p class="fs-2">Il tuo spazio per gestire gli annunci e le tue informazioni</p>
            </div>
            <div class="col-2 m-5">
                <a href=""><img class="img-fluid" src="{{ asset('img/utente.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="row">
            <p class="fs-3 text-center">Completa il tuo profilo! Fatti conoscere ai tuoi possibili acquirenti!</p>
            @if (session()->has('success'))
                <div class=" col-3 alert alert-success mt-2 mx-auto text-center">{{ session('success') }}</div>
            @endif
            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                <div class="row col-12 justify-content-center">
                    <div class="col-12 col-lg-5 m-2">
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Nome completo</label>
                            <input disabled name="name" type="text" class="form-control" id="name" aria-describedby="name" @if (auth()->user()) value="{{ auth()->user()->name }}"
                            @else
                            placeholder="Nome" @endif>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Indirizzo</label>
                            <input name="address" type="text" class="form-control" value="{{ old('address') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Numero di telefono</label>
                            <input name="phone" type="text" class="form-control" value="{{ old('phone') }}">
                        </div>
                        
                    </div>
                    <div class="col-12 col-lg-5 m-2">

                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Email address</label>
                            <input disabled name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" @if (auth()->user()) value="{{ auth()->user()->email }}"
                            @else
                            placeholder="E-mail" @endif>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Città</label>
                            <input name="city" type="text" class="form-control" value="{{ old('city') }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Web Site</label>
                            <input name="site" type="text" class="form-control" value="{{ old('city') }}">
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