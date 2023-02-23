<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Presto.it</h1>
            </div>

            </div>
            <div class="row justify-content-center">
                @foreach ($announcements as $announcement)
                    <div class="card mx-auto m-3 maincolor" style="width: 20rem;">
                        <img src="https://picsum.photos/200" class="card-img-top mt-3 rounded" alt="...">
                        <div class="card-body">
                            <h4 class="card-title textwhite">{{ $announcement->title }}</h4>
                            <p class="card-text textwhite">{{ $announcement->price}}</p>
                            <a href="{{ route('announcements.show', $announcement) }}"
                                class="btn btn-primary shadow">Visualizza</a>
                            <a href=""
                                class="border-dark pt-2 my-2 card-link shadow btn btn-success border-top">Categoria:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
