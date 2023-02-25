<x-layout>
    <div class="container mt-5">
        <form action="/forgot-password" method="POST" class=" mt-5">
            <div class="column g-3 pt-2">
                <div class="col-6 mx-auto">
                    <h1 class="mt-5">Recupero password</h1>
                    <div class="col-12 mb-2">
                        @csrf
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control mt-1">
                    </div>
                    <div class="col-12 mb-2">
                        <button class="btn btn-outline-secondary">Conferma</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</x-layout>
