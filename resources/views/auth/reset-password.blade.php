<x-layout>
    <div class="container mt-5">
        <form action="/reset-password" method="POST" class=" mt-5">
            @csrf
            <div class="column g-3 pt-2">
                <div class="col-6 mx-auto">
                    <h1 class="mt-5">Conferma nuova password</h1>

                    <div class="col-12 mb-2">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control mt-1">
                    </div>
                    @error('email')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror

                    <div class="col-12 mb-2">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control mt-1">
                    </div>
                    @error('password')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror

                    <div class="col-12 mb-2">
                        <label for="password-confirmation">Conferma Password</label>
                        <input type="password" id="password-confirmation" name="password_confirmation"
                            class="form-control mt-1">
                    </div>
                    @error('password-confirmation')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror

                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    <div class="col-12 mb-2">
                        <button class="btn btn-outline-secondary">Conferma</button>
                    </div>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

        </form>
    </div>
</x-layout>
