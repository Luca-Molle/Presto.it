<x-layout>
    <div class="container-fluid bg-dark">
        <div class="column pt-1">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="text-center mt-5 text-white pb-4">
                    @if ($announcements_to_check > 0)
                        <span>
                            Hai <span class="text-danger fw-bold">
                                {{ \App\Models\Announcement::toBeRevisionedCounter() }}</span>
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
        <div class="row mt-5 ">
            <div class="col-12 col-md-8 d-flex">
                @if ($announcementsToCheck)
                    @foreach ($announcementsToCheck as $announcement)
                        <div class="col-12 col-md-5 col-lg-3 mt-4 m-3">
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
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-4 shadow py-2">
                <h3>Ultimi annunci revisionati</h3>
                @if ($checkedAnnouncements)
                    @foreach ($checkedAnnouncements as $announcement)
                        <div class="col-12 d-flex border">
                            <div class="col-6 border p-2 d-flex justify-content-center align-items-center">
                                <h6><a href="{{ route('announcements.rev', $announcement) }}"
                                        class="nav-link @if ($announcement->is_accepted == 1) text-success
                                @elseif ($announcement->is_accepted == 0)
                                text-danger @endif">{{ $announcement->title }}</a>
                                </h6>
                            </div>
                            <div class="col-6 border p-2">
                                <p>{{ $announcement->updated_at }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>

</x-layout>
