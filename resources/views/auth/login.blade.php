@extends('base')

@section('title','Login')

@section('content') <br><br>
   <h1>Login</h1>

   <div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto bg-info">
            <h1 class="text-center text-muted mb-3 mt-5">SE CONNECTER</h1>
            <p class="text-center text-muted mb-3">Your articles are waiting for you!</p>

            <form method="POST"  action="{{route('login')}}">
                <!-- Proteger et gerer les erreurs du formulaire-->
                    @csrf
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                <!--Les champs du formulaire-->
                    <label for="email">EMAIL</label>
                    <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus>

                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" id="password"  value="{{old('password')}}" required autocomplete="password" autofocus>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Rememnber me !</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="#">Forget password ?</a>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">Se connecter</button>
                    </div>
                    <p class="text-center text-muted mt-5">Vous n'avez pas de compte?
                        <a href="{{route('register')}}">Inscrivez vous ! </a>
                    </p>
            </form>
        </div>
    </div>
   </div>
@endsection
