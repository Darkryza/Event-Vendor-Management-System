{{-- <nav class="sticky-top">
  <div class="left-navbar">
    @auth
        @if (auth()->user()->role == 'Event Manager')
          <a href="/manager_homepage">
            <img class="UTMlogo" src="{{ asset('images/UTM-LOGO-FULL.png') }}" alt="logo">
          </a>
          <a class="app-name" href="/manager_homepage">
            {{ config('app.name') }}
          </a>
        @elseif (auth()->user()->role == 'Vendor')
          <a href="/vendor_homepage">
            <img class="UTMlogo" src="{{ asset('images/UTM-LOGO-FULL.png') }}" alt="logo">
          </a>
          <a class="app-name" href="/manager_homepage">
            {{ config('app.name') }}
          </a>
        @elseif (auth()->user()->role == 'Admin')
          <a href="/admin_homepage">
            <img class="UTMlogo" src="{{ asset('images/UTM-LOGO-FULL.png') }}" alt="logo">
          </a>
          <a class="app-name" href="/admin_homepage">
            {{ config('app.name') }}
          </a>
        @endif
        @else
          <a href="/">
            <img class="UTMlogo" src="{{ asset('images/UTM-LOGO-FULL.png') }}" alt="logo">
          </a>
          <a class="app-name" href="/">
            {{ config('app.name') }}
          </a>
        @endauth
  </div>
  
  <div class="right-navbar">
    <ul class="link-navbar">
      <li class="navbar-list">
        <a href="/profile">
          @auth
            {{ auth()->user()->username }}
          @endauth
        </a>
      </li>
      @auth
        <li class="navbar-list">
          <a class="btn nav-link nav_text" href="/logout">Logout</a>
        </li>
      @else
        <li class="navbar-list">
          <a href="/login">Login</a>
        </li>
        <li class="navbar-list">
          <a href="/register">Register</a>
        </li>
      @endauth
    </ul>
    <div class="toggle-btn">
      <i class="fa-solid fa-bars"></i>
    </div>
  </div>
  
</nav> --}}

<nav class="navbar navbar-light navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>