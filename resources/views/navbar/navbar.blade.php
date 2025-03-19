


<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand me-auto" href="#">MyApp</a>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link mx-lg-2 active" aria-current="page" href="{{route('app_home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="{{route('app_about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
  <!--    <a href="" class="login-button">Login</a>   -->
      <!-- Bouton deroulant dropdown -->
        <div class="btn-group">
                {{-- Quand l'utilisateur n'est pas connecté , j'affiche le dropdown permettant la connexion et deconnexion --}}
            @guest
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Mon compte
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">Se connecter</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">S'inscrire</a></li>
                    </ul>
            @endguest
            {{-- Quand l'utilsateur est connecté , j'affiche le dropdown de deconnexion! --}}
            @auth
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('logout')}}">Se déconnecter</a></li>
                    </ul>
            @endauth
        </div>
        <button class="navbar-toggler" type="button"    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
  </nav>

<!-- End Navbar -->

