<div>
    <h4 class="text-center mt-5 fw-bold textmain fs-2">I Tuoi Annunci</h4>
    <table class="table table-bordered shadow mt-3 tab-presto">
        <thead>
            <tr class="textmain">
                <th class="fw-bold">Titolo</th>
                <th class="fw-bold">Prezzo</th>
                <th class="fw-bold">Categotia</th>
                <th class="fw-bold">Data pubblicazione</th>
                <th class="fw-bold">Status</th>
                <th class="fw-bold">Azioni</th>
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
                            wire:click="editAnnouncement({{ $announcement->id }})"
                            @if ($announcement->is_accepted === null) disabled @endif>Modifica</button>
                        <button class="btn btn-sm btn-danger" data-title="{{ $announcement->title }}"
                            data-bs-toggle="modal" data-bs-target="#modal-delete">Elimina</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($announcements as $announcement)
        @if ($announcement->id == null)
        @else
            {{-- Modal --}}
            <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma rimozione annuncio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div id="modal-delete-title" class="modal-body text-start">
                            Sei sicuro di voler rimuovere l'annuncio {{ $announcement->title }}, <br>
                            con prezzo {{ $announcement->price }}€?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-presto btn-sm"
                                data-bs-dismiss="modal">Annulla</button>
                            <button id="liveToastBtn" class="btn btn-danger btn-sm" wire:click="destroy({{ $announcement->id }})"
                                data-bs-dismiss="modal">Elimina</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
{{-- Componente notifica push --}}
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Notifica</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Annuncio eliminato correttamente
        </div>
    </div>
</div>