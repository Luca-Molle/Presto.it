<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
            <tr>
                <td>{{ $announcement->title }}</td>
                <td>{{ $announcement->price }}</td>
                <td class="text-end">
                    <button class="btn btn-sm btn-outline-secondary" wire:click="editAnnouncement({{ $announcement->id }})">modifica</button>
                    <button class="btn btn-sm btn-danger" wire:click="destroy({{ $announcement->id }})">elimina</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>