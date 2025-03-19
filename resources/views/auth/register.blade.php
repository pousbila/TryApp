L
@extends('base')

@section('title','Register')

@section('content') <br><br>
   <h1>Register</h1>

   <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto bg-info">
                <h1 class="text-center text-muted mb-3 mt-5">Register</h1>
                <p class="text-center text-muted mb-3">Create an account if you don't have one!</p>

                <form method="POST"  action="{{route('register')}}" class="row g-3" id="form_register">
                    @csrf
                    <!--Le champ Firstname-->
                    <div class="col-md-6">
                        <label for="firstname" class="form-label fw-bold">First Names </label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="{{old('firstname')}}" required autocomplete="firstname" autofocus>
                        <small class="text-danger fw-bold" id="error_register_firstname"></small>
                    </div>
                    <!--Le champ Lastname-->
                    <div class="col-md-6">
                        <label for="lastname" class="form-label fw-bold"> Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="{{old('lastname')}}" required autocomplete="lastname" autofocus>
                        <small class="text-danger fw-bold" id="error_register_lastname"></small>
                    </div>
                    <!--Le champ Email-->
                    <div class="col-md-12">
                        <label for="email" class="form-label fw-bold"> Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus url-existEmail="{{route('app_existEmail')}}" token="{{csrf_token()}}" >
                        <small class="text-danger fw-bold" id="error_register_email"></small>
                    </div>
                    <!--Le champ Password-->
                    <div class="col-md-6">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" required autocomplete="password" autofocus>
                        <small class="text-danger fw-bold" id="error_register_password"></small>
                    </div>
                    <!--Le champ Password-confirmation -->
                     <div class="col-md-6">
                        <label for="password_confirm" class="form-label fw-bold">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="{{old('password_confirm')}}" required autocomplete="password_confirm" autofocus>
                        <small class="text-danger fw-bold" id="error_register_password_confirm"></small>
                    </div>
                      <!-- Barre de force du mot de passe -->
                      <div class="col-md-6">
                        <div class="progress mt-2">
                            <div id="passwordStrengthBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                        </div>
                        <small id="passwordStrengthText" class="fw-bold"></small>
                    </div>
                    <!--Le checkbox d'acceptation des termes de confidentialités-->
                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="agreeTerme" value="" required  >
                            <label for="agreeTerme" class="form-label fw-bold">Agree Termes</label> <br>
                            <small class="text-danger fw-bold" id="error_register_agreeTerme"></small>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mx-2">
                        <button id="register_user" class="btn btn-primary mx-5" type="button">S'enregistrer</button>
                    </div>
                    <p class="text-center text-muted mt-5">Vous avez dejà un compte?
                        <a href="{{route('login')}}">Connecter vous !</a>
                    </p>
                </form>
            </div>
        </div>
   </div>

@endsection
