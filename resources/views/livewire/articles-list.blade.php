<div class="mt-5" style="overflow:scroll; height:400px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo Gallery</th>
                <th>Annuncio</th>
                <th>Categoria</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td>
                        <img src="https://static.fanpage.it/wp-content/uploads/sites/6/2020/04/migliori-pc-da-gaming.jpg" height="100" alt="">
                    </td>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->category->name }}</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary" wire:click="">modifica</button>
                        <button class="btn btn-sm btn-danger"
                            wire:click="destroy({{ $announcement->id }})">elimina</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
