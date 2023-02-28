<x-layout>
    <div class="container-fluid p-5 bg-gradient maincolor shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5 mt-5  text-center">
                <h1 class="display-2 text-dark text-white">Annuncio {{ $announcement->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{-- CAROSELLO --}}
            <h4 class="card-title">{{ $announcement->title }}</h4>
            <p class="card-text">{{ $announcement->price }}</p>
            <p class="card-text">{{ $announcement->description }}</p>
            <p class="card-text">Categoria: {{ $announcement->category->name }}</p>
            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
            <p class="card-footer">Autore: {{ $announcement->user->name ?? '' }}</p>
        </div>
        {{-- form di accettazione / rifiuto annuncio --}}
        <div class="col-12 col-md-6">
            <form action="{{ route('revisor.accept_announcement', $announcement) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-outline-success">Accetta</button>
            </form>
            <form action="{{ route('revisor.reject_announcement', $announcement) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-outline-danger">Rifiuta</button>
            </form>
        </div>
    </div>
</x-layout>
