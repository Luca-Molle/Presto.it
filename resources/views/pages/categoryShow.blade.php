<x-layout>
    <div class="container-fluid mx-0 bg-dark shadow">

        <div class="col-12  p-5 mt-5 text-center bg-dark">
            <h1 class="display-2 pacifico textmain ">{{ $category->name }}</h1>
        </div>

    </div>
    <div class="container">
        <div class="row justify-content-center">



            @forelse ($category->announcements as $announcement)
                @if ($announcement->is_accepted == true)
                    <div class="card mx-auto m-3 card-custom d-flex col-6 ">
                        <div class="row ">
                            <div class="col-6 d-flex align-items-center ">
                                <img src="https://static.fanpage.it/wp-content/uploads/sites/6/2020/04/migliori-pc-da-gaming.jpg"
                                    class="card-img-top rounded img-fluid" alt="...">
                            </div>
                            <div class="col-6">
                                <div class="card-body ">
                                    <h4 class="card-title">{{ $announcement->title }}</h4>
                                    <p class="card-text">{{ $announcement->price }} € </p>
                                    <a href="{{ route('announcements.show', $announcement) }}"
                                        class="btn btn-primary shadow">Visualizza</a>
                                    <a href=""
                                        class="border-dark pt-2 my-2 card-link shadow btn btn-success border-top">Categoria:
                                        {{ $announcement->category->name }}</a>
                                    <p class="card-footer">Pubblicato il:
                                        {{ $announcement->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    {{-- @elseif ($announcement->is_accepted == 0 || $announcement->is_accepted == null) --}}
                    {{-- @dd($announcement->is_accepted) --}}
                    {{$announcement}}
                        <div class="col-12 mt-2">
                        <p class="h1">Non sono presenti annunci per la categoria {{ $category->name }}</p>
                        <p class="h2">Pubblicane uno: <a href="{{ route('announcement.create') }}"
                            class="btn btn-primary shadow">Nuovo Annuncio</a></p>
                        </div>
                    
                    
            @endforelse
        </div>
    </div>
</x-layout>
