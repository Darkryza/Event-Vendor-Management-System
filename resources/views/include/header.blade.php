<nav class="sticky-top">
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
  
</nav>