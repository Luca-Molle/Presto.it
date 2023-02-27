<x-layout>
    <div class="container-fluid bg-dark">
        <div class="column pt-1">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="text-center mt-5 text-white pb-4">
                    {{ $announcementsToCheck ? 'Ecco gli annunci da revisionare!' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
        </div>

        <div class="row mt-5">
            {{-- Carousel foto annuncio --}}
            <div class="col-12">
                <div class="carousel slide" data-bs-ride='carousel'>

                </div>
            </div>

            {{-- form di accettazione / rifiuto annuncio --}}
            <div class="col-12 col-md-6">
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-outline-success">Accetta</button>
                </form>
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-outline-danger">Rifiuta</button>
                </form>
            </div>
        </div>

    </div>
    

</x-layout>