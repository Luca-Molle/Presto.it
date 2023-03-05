<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="textmain fw-bold pt-5">Il tuo profilo</h1>
                <p class="fs-2">Il tuo spazio per gestire gli annunci e le tue informazioni</p>
            </div>
            <div class="col-2  m-5">

                <a href=""><img class="img-fluid" src="{{ asset('img/utente.png') }}" alt="">
                </a>

            </div>

        </div>


        <div class="row">
            <p class="fs-3">Completa il tuo profilo! Fatti conoscere ai tuoi possibili acquirenti!</p>
            <form action="##" method="POST">
                @csrf
                <div class="d-flex flex-row ">
                    <div class="w-50 m-2">
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Nome completo</label>
                            <input name="name" type="text"class="form-control" id="name"
                                aria-describedby="name"
                                @if (auth()->user()) value="{{ auth()->user()->name }}"
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
                        <div class=" d-flex mt-4">
                            <a href="/forgot-password"><button class=" btn btn-presto">Reset password</button></a>
                        </div>



                    </div>


                    <div class="w-50 m-2">

                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail"
                                aria-describedby="emailHelp"
                                @if (auth()->user()) value="{{ auth()->user()->email }}"
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

        </div>
        <div class="row">

            <div class="col-6 ">
                <livewire:announcements-list />
            </div>
            <div class="col-5 offset-1">
                <livewire:edit-announcement />
            </div>
        </div>
    </div>

</x-layout>
