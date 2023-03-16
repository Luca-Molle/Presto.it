<div class="container">
    <h4 class="text-center mt-5 fw-bold textmain fs-2" id="top" >{{__('ui.announcementsAnn')}}</h4>


    {{-- TABELLA VISUALE PC --}}
    @foreach ($announcements as $announcement)
        <div class="col-12 d-flex justify-content-center d-none d-md-block mb-2 p-3 my-1 shadow bg-white">

            <div class="row align-items-center justify-content-between">
                <div class="col-5 ms-3">
                    <a class="textmain nav-link fw-bold" href="{{ route('announcements.show', $announcement) }}">
                        {{ $announcement->title }}
                    </a>
                </div>
                {{-- modale di controllo annuncio --}}
                @if ($announcement->reject_message)
                    <div class="col-1 d-flex justify-content-center">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $announcement->id }}">
                            <i class="bi bi-exclamation-circle-fill text-danger fs-5"></i>
                        </button>
                    </div>
                @endif
                <div class="col-4 d-flex justify-content-end ms-5">
                    <a class="btn btn-sm btn-outline-presto "
                        href="{{ route('categoryShow', $announcement->category) }}">
                        {{ $announcement->category->name }}
                    </a>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="column col-2">
                    <div class="col-12 text-center">Status</div>
                    <div class="col-12">
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
                    </div>
                </div>
                <div class="col-3 fw-bold text-center">
                    € {{ $announcement->price }}
                </div>
                <div class="col-3 text-center">
                    Creato il: {{ $announcement->created_at->format('d/m/Y') }}
                </div>
                <div class="col-3 d-flex p-1">
                    <button class="btn btn-sm btn-outline-presto me-2 my-2"
                        wire:click="editAnnouncement({{ $announcement->id }})"
                        @if ($announcement->is_accepted === null) disabled @endif> {{__('ui.buttonModify')}}
                    </button>
                    <button class="btn btn-sm btn-danger me-2 my-2" data-title="{{ $announcement->title }}"
                        data-bs-toggle="modal" data-bs-target="#delete-{{ $announcement->id }}">
                        {{__('ui.buttondelete')}}
                    </button>
                </div>
            </div>

        </div>
    @endforeach
    {{ $announcements->links() }}
    {{-- FINE TABELLA VISUALE PC --}}
  
    {{-- Tabella visibile da mobile --}}
    @foreach ($announcements as $announcement)
        <div class="col-12 d-flex justify-content-center d-block d-md-none">
            <div class="card p-3 my-1 shadow">
                <div class="col-12 text-center">
                    <a class="textmain nav-link"
                        href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                </div>
                <div class="row align-items-center">
                    <div class="col-3">
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
                    </div>
                    <div class="col-3 d-flex p-1">
                        <a class="btn btn-sm btn-outline-presto me-2 my-2"
                            wire:click="editAnnouncement({{ $announcement->id }})" href="#" data-kt-scroll-toggle
                            @if ($announcement->is_accepted === null) disabled @endif>
                            {{__('ui.buttonModify')}}
                        </a>
                        <button class="btn btn-sm btn-danger me-2 my-2" data-title="{{ $announcement->title }}"
                            data-bs-toggle="modal" data-bs-target="#modal-delete">
                            {{__('ui.buttondelete')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Fine tabella mobile --}}


    @foreach ($announcements as $announcement)
        @if ($announcement->id == null)
        @else
            {{-- Modal per conferma eliminazione annuncio --}}
            <div class="modal fade" id="delete-{{ $announcement->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma rimozione annuncio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div id="modal-delete-title" class="modal-body text-start" >
                            {{__('ui.textRand1')}} {{ $announcement->title }}, <br>
                            {{__('ui.textRand2')}} {{ $announcement->price }}€?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-presto btn-sm"
                                data-bs-dismiss="modal">{{__('ui.textRand3')}}</button>
                            <button id="liveToastBtn" class="btn btn-danger btn-sm"
                                wire:click="destroy({{ $announcement->id }})" data-bs-dismiss="modal">{{__('ui.buttondelete')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach


    {{-- Modale lettura messaggio di rifiuto annuncio --}}
    @foreach ($announcements as $announcement)
        <div class="modal fade" id="modal-{{ $announcement->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold fs-5 text-danger" id="exampleModalLabel">{{__('ui.textRand4')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body fw-b">
                        Commento del revisore: 
                    </div>
                    <div class="modal-body">
                        {{ $announcement->reject_message }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


{{-- Componente notifica push --}}
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">{{__('ui.textNotify')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{__('ui.DeleteAnn')}}
        </div>
    </div>
</div>
