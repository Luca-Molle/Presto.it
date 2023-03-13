<x-layout>

    <div class="container">
        <div class="row  align-items-between">
            <div class=" col-4 mt-5 position-sticky">


                <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
                    @csrf
                    <label for="search-input"></label>
                    <input type="search" name="searched" class="form-control me-2" id="search-input"
                        placeholder="Ricerca l'annuncio" aria-label="Search">
                    <button type="submit" class="btn btn-presto">Cerca</button>
                </form>


            </div>
            <div class=" col-8 ">
                @forelse ($announcements as $announcement)
                    <div class="bg-white my-2 shadow p-3 mt-5 card-announcement" data-aos="zoom-in">
                        <div class="row ">
                            <div class="col-6 mt-4">
                                <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(700, 500): 'https://blumagnolia.ch/wp-content/uploads/2021/05/placeholder-126.png' }}"
                                    class="img-fluid card-image rounded shadow mt-3" alt="foto"></a>
                            </div>
                            <div class="col-4 ms-4">
                                <h4 class="fw-bold">{{ $announcement->title }}</h6>
                                    <h5 class="textmain text-end fw-bold">€ {{ $announcement->price }}</h5>
                                    <p class="mt-5 card-footer">Pubblicato il:
                                        {{ $announcement->created_at->format('d/m/Y') }}
                                    </p>
                                    <a class="btn btn-presto d-flex justify-content-center shadow mt-5"
                                        href="{{ route('announcements.show', $announcement) }}">Visualizza</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center" style="height: 75px">
                            <a class=" h-50 col-12 btn btn-outline-presto shadow"
                                href="{{ route('categoryShow', $announcement->category) }}">
                                <p class="textmain fw-bold text-center">{{ $announcement->category->name }}</p>
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
    </div>

</x-layout>
