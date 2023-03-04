<div class="container">
    <div class="row">
        <div class="mt-5">
            <h1 class="mt-3 textmain fw-bold">Inserisci Annuncio</h1>
            <form wire:submit.prevent="store">
                <div class=" d-flex flex-column mb-3">

                    <div class="col-12">
                        @if (session()->has('message'))
                            <div class="alert alert-success mt-4">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="col-6 mt-3">
                                <select wire:model.defer="category" id="category" class="form-select"
                                    aria-label="Default select example">
                                    <option value="">Scegli la categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class=" mt-3">
                                <label for="title">Titolo annuncio</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" wire:model.lazy="title">
                                <div class="col-4">
                                    @error('title')
                                        <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class=" mt-3">
                                <label for="description">Descrizione</label>
                                <textarea type="text" name="description" id="description" rows="10"
                                    class="form-control @error('description') is-invalid @enderror" wire:model.lazy="description">
                            </textarea>
                                <div class="col-4 mt-3">
                                    @error('description')
                                        <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="price">Prezzo</label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror" wire:model.lazy="price">
                                <div class="col-4">
                                    @error('price')
                                        <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mt-4">
                                <button class="btn btn-presto" type="submit" id="userSubmitBtn">Crea</button>
                            </div>

                        </div>

                        <div class="col-6">
                            <div class="container text-start text-dark border border-dark-subtle rounded ">
                                <p class="fs-5 m-3 textmain fw-bold">Alcuni consigli per il tuo annuncio </a>
                                </p>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('img/foto.png') }}" alt="logo mancante"
                                        class="img-fluid col-2 m-3 p-2">
                                    <div class="col-9">
                                        <p class="col-10">
                                        <p class="textmain fw-bold"> Scatta delle belle foto </p>Metti bene a fuoco
                                        l'oggetto e
                                        cerca una superficie, o uno sfondo con meno distrazioni possibili. Una bella
                                        foto ti aiuterà ad attirare più persone interessate.</p>
                                    </div>

                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('img/prezzo.png') }}" alt="logo mancante"
                                        class="img-fluid col-2 p-2 m-3">
                                    <div class="col-9">
                                        <p class="col-10">
                                        <p class="textmain fw-bold"> Fai il tuo prezzo! </p>Se sei indeciso, dai
                                        un'occhiata al
                                        prezzo degli annunci simili al tuo.</p>
                                    </div>

                                </div>

                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('img/chiaro.png') }}" alt="logo mancante"
                                        class="img-fluid col-2 m-3 p-2">
                                    <div class="col-9">
                                        <p class="col-10">
                                        <p class="textmain fw-bold"> Scrivi un annuncio chiaro </p> Cerca di inserire
                                        tutte le
                                        specifiche del prodotto che vuoi vendere con una descrizione chiara e completa.
                                        </p>
                                    </div>

                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ asset('img/messaggio.png') }}" alt="logo mancante"
                                        class="img-fluid col-2 m-3 p-2">
                                    <div class="col-9">
                                        <p class="col-10">
                                        <p class="textmain fw-bold"> Rispondi sempre ai messaggi</p>Interagisci con gli
                                        altri in
                                        modo chiaro e rispondi tempestivamente per concludere la vendita nel modo
                                        migliore!</p>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
