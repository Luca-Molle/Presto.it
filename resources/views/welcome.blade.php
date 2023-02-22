<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Presto.it</h1>

                @if (Route::is('categoryShow'))
                    @forelse ($category->announcements as $announcement)
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">{{ $announcement->title }}</h4>
                                <p class="card-text">{{ $announcement->category->name }}</p>
                                <p class="card-text">{{ $announcement->price }}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>

                    @empty
                        <div class="col-12">
                            Non ci sono annunci
                        </div>
                    @endforelse
                
                @else
                        @foreach ($announcements as $announcement)
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">{{ $announcement->title }}</h4>
                                <p class="card-text">{{ $announcement->category->name }}</p>
                                <p class="card-text">{{ $announcement->price }}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        @endforeach
                @endif
                {{-- {{ $announcements->link() }} --}}
            </div>
        </div>
    </div>
</x-layout>
