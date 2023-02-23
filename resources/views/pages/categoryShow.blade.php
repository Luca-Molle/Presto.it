<x-layout>
    <div class="container-flui p-5 bg-gradient bg-seccess shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5 text-center">
                <h1 class="display-2">Esplora la catgoria {{ $category->name }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($category->announcements as $announcement)
                    <div class="card shadow mx-4 my-4" style="width: 18rem;">
                        <img src="https://picsum.photos/200" class="card-img-top rounded" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $announcement->title }}</h4>
                            <p class="card-text">{{ $announcement->price }}</p>
                            <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-primary shadow">Visualizza</a>
                            <a href="" class="border-dark pt-2 my-2 card-link shadow btn btn-success border-top">Categoria: {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
            @empty
                <div class="col-12">
                    <p class="h1">Non sono presenti annunci per la categoria {{ $category->name }}</p>
                    <p class="h2">Pubblicane uno: <a href="{{ route('announcement.create') }}" class="btn btn-primary shadow">Nuovo Annuncio</a></p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>