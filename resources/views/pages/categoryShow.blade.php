<x-layout>
    <div class="container-fluid mx-0 bg-dark shadow">

        <div class="col-12  p-5 mt-5 text-center bg-dark">
            <h1 class="display-2 pacifico textmain ">{{ $category->name }}</h1>
        </div>

    </div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            @forelse ($category->announcements as $announcement)
                    <div class="bg-white my-2 shadow p-3 mt-5 ">
                        <div class="row ">
                            <div class="col-6 mt-4 ">
                                <a href="{{ route('announcements.show', $announcement) }}">
                                <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-15-9520/media-gallery/black/laptop-xps-9520-t-black-gallery-4.psd?fmt=pjpg&pscan=auto&scl=1&wid=3491&hei=2077&qlt=100,1&resMode=sharp2&size=3491,2077&chrss=full&imwidth=5000"
                                    class="img-fluid card-image p-2" alt="...">
                                </a>
                            </div>
                            <div class="col-4 ms-4">
                                <div class="card-body ">
                                    <h2 class="card-title fw-bold">{{ $announcement->title }}</h2>
                                    <h3 class="card-text textmain fw-bold text-end">{{ $announcement->price }} € </h3>
                                    <p class="mt-5 card-footer">Pubblicato il:
                                        {{ $announcement->created_at->format('d/m/Y') }}
                                    </p>
                                    <a href="{{ route('announcements.show', $announcement) }}"
                                        class="btn btn-presto d-flex justify-content-center shadow mt-5">Visualizza</a>
                                    <h6 class="mt-3 fw-bold">Descrizione: </h6>
                                    <p>{{ $announcement->description }}</p>
                                    <a class="mt-4 btn btn-outline-presto" href="{{ route('announcement.create') }}">Inserisci annuncio simile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @empty
                        <div class="col-12 mt-2">
                        <p class="h1">Non sono presenti annunci per la categoria {{ $category->name }}</p>
                        <p class="h2">Pubblicane uno: <a href="{{ route('announcement.create') }}"
                            class="btn btn-presto shadow">Nuovo Annuncio</a></p>
                        </div>
                    
                    
            @endforelse
        </div>
    </div>
</x-layout>
