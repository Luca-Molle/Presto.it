<x-layout>
    <div class="container">
        <div class="row">

            <div class="row justify-content-center ">
                <div class="col-12 mt-5">
                    @foreach ($announcements as $announcement)
                        <div class="card mx-auto m-3 card-custom d-flex col-6 ">

                            <div class="row ">
                                <div class="col-6 d-flex align-items-center ">
                                    <img src="https://st.ilfattoquotidiano.it/wp-content/uploads/2022/09/13/Berlusconi-Peppa-690x362.jpg"
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
                    @endforeach
                    {{ $announcements->links() }}
                </div>

            </div>
        </div>
    </div>
</x-layout>
