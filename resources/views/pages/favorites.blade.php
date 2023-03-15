<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h2 class="fw-bold textmain">SEZIONE PREFERITI</h2>
                <div class="row">
                            @foreach ($announcements as $announcement)
                                <div class="col-12 col-md-5 col-lg-3 mt-4 d-flex align-self-stretch ">
                                    <div class="d-flex flex-column rounded bg-white mb-4 shadow p-3">

                                        <a href="{{ route('categoryShow', $announcement->category) }}"
                                            class=" btn btn-outline-presto">{{ $announcement->category->name }}</a>

                                        <a href="{{ route('announcements.show', $announcement) }}">
                                            <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(700, 500): 'https://blumagnolia.ch/wp-content/uploads/2021/05/placeholder-126.png' }}"
                                                class="img-fluid card-image rounded shadow mt-3" alt="foto"></a>

                                        <h4 class="fw-bold mt-2">{{ $announcement->title }}</h4>
                                        <div class="mt-auto">
                                            <h5 class="textmain fw-bold text-end ">€ {{ $announcement->price }}</h5>
                                            <a class="btn btn-presto shadow mt-1 d-flex justify-content-center mb-0 "
                                                href="{{ route('announcements.show', $announcement) }}">Visualizza</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                </div>

            </div>
        </div>
    </div>
</x-layout>
