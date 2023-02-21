<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="">Login</h1>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" >
                        <div id="emailHelp" class="form-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam maiores aperiam vel, eligendi voluptate totam!
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="passwordInputPassword1" class="form-label">Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                </div>
                <div class="mb-3 form-check">
                    <input name="remember" type="checkbox" class="form-check" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheack1">Remember</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>