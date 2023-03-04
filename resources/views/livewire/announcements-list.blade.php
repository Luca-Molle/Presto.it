<div>
    <h4 class="text-center mt-5 fw-bold textmain">I Tuoi Annunci</h4>
    <table class="table table-bordered bg-white shadow mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
            <tr>
                <td>{{ $announcement->title }}</td>
                <td>{{ $announcement->price }}</td>
                <td>
                    @if ($announcement->is_accepted == true)
                        <p class="text-success small">Accettato</p>
                        @elseif ($announcement->is_accepted === 0)
                            <p class="text-danger small">Rifiutato</p>
                        @elseif ($announcement->is_accepted === null)
                            <p class="text-warning small">In attesa</p>
                    @endif
                </td>
                <td class="text-end">
                    <button class="btn btn-sm btn-outline-presto" wire:click="editAnnouncement({{ $announcement->id }})">modifica</button>
                    <button class="btn btn-sm btn-danger" wire:click="destroy({{ $announcement->id }})">elimina</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>