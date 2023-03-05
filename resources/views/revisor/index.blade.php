<x-layout>
    <div class="container-fluid bg-dark">
        <div class="column pt-1">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="text-center mt-5 text-white pb-4">
                    @if ($announcements_to_check > 0)
                        <span>
                            Hai <span class="textmain fw-bold">
                                {{ \App\Models\Announcement::toBeRevisionedCounter() }}</span>
                            annunci da revisionare!
                        </span>
                    @else
                        <span>
                            Non ci sono annunci da revisionare
                        </span>
                    @endif
                </h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-6 ">
                <div class="row">
                    @if ($announcementsToCheck)
                        @foreach ($announcementsToCheck as $announcement)
                            @if ($announcement->user_id == auth()->user()->id)
                            @else
                                <div class="col-4 d-flex">
                                    <div class=" rounded bg-white mb-4 shadow p-3  align-items-stretch">
                                        <p class="textmain fw-bold text-center">{{ $announcement->category->name }}</p>
                                        <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-15-9520/media-gallery/black/laptop-xps-9520-t-black-gallery-4.psd?fmt=pjpg&pscan=auto&scl=1&wid=3491&hei=2077&qlt=100,1&resMode=sharp2&size=3491,2077&chrss=full&imwidth=5000"
                                            class="img-fluid card-image" alt="foto">
                                        <div>
                                            <h6 class="fw-bold ">{{ $announcement->title }}</h6>
                                            <h5 class="textmain fw-bold text-end">€ {{ $announcement->price }}</h5>
                                            <a class="btn btn-presto shadow mt-1"
                                                href="{{ route('announcements.rev', $announcement) }}">Visualizza</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-6 ">
                <div class="row justify-content-center">
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fw-bold textmain">Ultimi annunci revisionati</h3>
                    </div>
                    <div class=" col-8">
                        <table class="table table-bordered tab-presto shadow mt-3">
                            <thead class="p-2 text-center">
                                <tr>
                                    <th>Check</th>
                                    <th>Titolo</th>
                                    <th>Ultimo aggiornamento</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($checkedAnnouncements)
                                    @foreach ($checkedAnnouncements as $announcement)
                                        @if ($announcement->user_id == auth()->user()->id)
                                        @else
                                            <tr>
                                                <td>
                                                    @if ($announcement->is_accepted == true)
                                                        {{-- <p class="text-success fs-5 col-8">Accettato </p> --}}
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('img/green.png') }}" alt="verde"
                                                                class="img-fluid w-50">
                                                        </div>
                                                    @elseif ($announcement->is_accepted === 0)
                                                        {{-- <p class="text-danger small">Rifiutato</p> --}}
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('img/red.png') }}" alt="verde"
                                                                class="img-fluid w-50">
                                                        </div>
                                                    @elseif ($announcement->is_accepted === null)
                                                        {{-- <p class="text-warning small">In attesa</p> --}}
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('img/orange.png') }}" alt="verde"
                                                                class="img-fluid w-50">
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <h6><a href="{{ route('announcements.rev', $announcement) }}"
                                                            class="link @if ($announcement->is_accepted == 1) text-success
                                @elseif ($announcement->is_accepted == 0)
                                text-danger @endif">{{ $announcement->title }}</a>
                                                    </h6>
                                                </td>
                                                <td class="text-center">
                                                    <p>{{ $announcement->updated_at }}</p>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>









            </div>
        </div>

    </div>

</x-layout>
