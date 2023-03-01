<x-layout>
    <form action="{{ route('become.revisor') }}" method="POST" class=" g-3">
        @csrf
        <div class="container">
            <div class="row ">
                <div class="col-12 col-lg-6 mx-auto">
                    <h1 class=" mt-5">Lavora con noi</h1>
                    
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="col-12">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="message">Messaggio</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-outline-secondary">Invia</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>