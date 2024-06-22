<nav>
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
          <a class="app-name" href="/vendor_homepage">
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
      @auth
        <li class="navbar-list">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->username }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/profile">Profile</a></li>
              <li><a class="dropdown-item" href="/">About</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
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
  
</nav>