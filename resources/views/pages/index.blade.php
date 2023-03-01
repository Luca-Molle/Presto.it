<x-layout>

    <div class="container">
        <div class="row  align-items-between">
            <div class=" col-4 ">
                <h2 class="mt-5">Sezione filtri</h2>
            </div>
            <div class=" col-8 ">
                @forelse ($announcements as $announcement)
                    <div class="bg-white my-2 shadow p-3 mt-5">
                        <div class="row">
                            <div class="col-6 mt-4">
                                <a href="{{ route('announcements.show', $announcement) }}"><img
                                        src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-15-9520/media-gallery/black/laptop-xps-9520-t-black-gallery-4.psd?fmt=pjpg&pscan=auto&scl=1&wid=3491&hei=2077&qlt=100,1&resMode=sharp2&size=3491,2077&chrss=full&imwidth=5000"
                                        class="img-fluid card-image p-2" alt="foto"></a>
                            </div>
                            <div class="col-4 ms-4">
                                <h4 class="fw-bold">{{ $announcement->title }}</h6>
                                    <h5 class="textmain fw-bold">€ {{ $announcement->price }}</h5>
                                    <p class="mt-5 card-footer">Pubblicato il:
                                        {{ $announcement->created_at->format('d/m/Y') }}
                                    </p>
                                    <a class="btn btn-outline-secondary shadow mt-5"
                                        href="{{ route('announcements.show', $announcement) }}">Visualizza</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center" style="height: 75px"><a
                                class=" h-50 col-12 btn btn-outline-secondary shadow" href="#">
                                <p class="textmain fw-bold text-center">{{ $announcement->category->name }}
                                </p>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mt-5">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">Non ci sono annunci per questa ricerca</p>
                        </div>
                    </div>
                @endforelse
                {{ $announcements->links() }}
            </div>
        </div>

</x-layout>
