<x-layout>
    <div class="container-fluid bg-dark">
        <div class="column pt-1">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="text-center mt-5 text-white pb-4">
                    @if ($announcements_to_check > 0)
                        <span>
                            Hai <span class="text-danger fw-bold"> {{ \App\Models\Announcement::toBeRevisionedCounter() }}</span>
                            annunci da revisionare!
                        </span>
                    @else
                        <span>
                            Non ci sono annunci da revisionare
                        </span>
                    @endif
                    {{-- {{ $announcementsToCheck ? 'Ecco gli annunci da revisionare!' : 'Non ci sono annunci da revisionare' }} --}}
                </h1>
            </div>
        </div>



    </div>
    <div class="container">

        @if ($announcementsToCheck)
            <div class="row mt-5 ">
                @foreach ($announcementsToCheck as $announcement)
                    <div class="col-12 col-md-5 col-lg-3 mt-4">
                        <div class="column rounded bg-white mb-4 shadow p-3">
                            <p class="textmain fw-bold text-center">{{ $announcement->category->name }}</p>
                            <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-15-9520/media-gallery/black/laptop-xps-9520-t-black-gallery-4.psd?fmt=pjpg&pscan=auto&scl=1&wid=3491&hei=2077&qlt=100,1&resMode=sharp2&size=3491,2077&chrss=full&imwidth=5000"
                                class="img-fluid card-image" alt="foto">
                            <div>
                                <h4 class="fw-bold">{{ $announcement->title }}</h6>
                                    <h5 class="textmain fw-bold">€ {{ $announcement->price }}</h5>
                                    <a class="btn btn-outline-secondary shadow mt-1"
                                        href="{{ route('announcements.rev', $announcement) }}">Visualizza</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                        <h5 class="card-title">Titolo: {{ $announcementToCheck->title }}</h5>
                        <p class="card-text">Descrizione: {{ $announcementToCheck->description }}</p>
                        <p class="card-footer">Pubblicato il : {{ $announcementToCheck->created_at->format('d/m/Y') }}
                        </p>
                    </div> --}}
                @endforeach
                {{-- Carousel foto annuncio --}}
                {{-- <div class="col-12">
                <div class="carousel slide" data-bs-ride='carousel'>

                </div>
            </div> --}}



            </div>
        @endif

    </div>

</x-layout>
