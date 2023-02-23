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
                <a href="" class="border-dark pt-2 my-2 card-link shadow btn btn-success border-top">Categoria: {{ $announcement->category->name }}</a>
                <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                <p class="card-footer">Autore: {{ $announcement->user->name ?? '' }}</p>
            </div>
        </div>
</x-layout>