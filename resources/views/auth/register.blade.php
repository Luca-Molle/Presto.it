<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Registrati</h1>
                <form action="{{route('register')}}"> method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome completo</label>
                        <input name="name" type="text"class="form-control" id="name" aria-describedby="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" >
                        <div id="emailHelp" class="form-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam maiores aperiam vel, eligendi voluptate totam!
                        </div>
                    </div>
                <div class="mb-3">
                    <label for="passwordInputPassword1" class="form-label">Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Registrati</button>
            </form>
            </div>
        </div>
    </div>



<x-layout>