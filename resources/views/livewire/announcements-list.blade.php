<div>
    <h4 class="text-center mt-5 fw-bold textmain fs-2">I Tuoi Annunci</h4>
    <table class="table table-bordered bg-white shadow mt-3">
        <thead>
            <tr class="textmain">
                <th class="fw-bold">Titolo</th>
                <th class="fw-bold">Prezzo</th>
                <th class="fw-bold">Categotia</th>
                <th class="fw-bold">Data pubblicazione</th>
                <th class="fw-bold">Status</th>


                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>€ {{ $announcement->price }}</td>
                    <td>{{ $announcement->category->name }}</td>
                    <td>{{ $announcement->created_at->format('d/m/Y') }}</td>

                    <td>
                        @if ($announcement->is_accepted == true)
                            {{-- <p class="text-success fs-5 col-8">Accettato </p> --}}
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/green.png') }}" alt="verde" class="img-fluid w-50">
                            </div>
                        @elseif ($announcement->is_accepted === 0)
                            {{-- <p class="text-danger small">Rifiutato</p> --}}
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/red.png') }}" alt="verde" class="img-fluid w-50">
                            </div>
                        @elseif ($announcement->is_accepted === null)
                            {{-- <p class="text-warning small">In attesa</p> --}}
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/orange.png') }}" alt="verde" class="img-fluid w-50">
                            </div>
                        @endif
                    </td>
                    <td class="text-end d-flex">
                        <button class="btn btn-sm btn-outline-presto me-2"
                            wire:click="editAnnouncement({{ $announcement->id }})">Modifica</button>
                        <button class="btn btn-sm btn-danger"
                            wire:click="destroy({{ $announcement->id }})">Elimina</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
