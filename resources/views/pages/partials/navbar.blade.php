<nav id="head" class="navbar nav navbar-expand-lg fixed-top" onscroll="Scroll()">
  <div class="nav-box">
  </div>
  <a class="navbar-brand" href="#">
    <img src="{{ asset('ui/svg/logo/chilipp.svg') }}" alt="" class="brand-var">
  </a>
  <div class="toggle">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

  <div class="collapse pl-5 navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto topnav">
      <li class="nav-item">
        <a class="nav-link" href="/#beranda">Beranda <span class="sr-only">(current)</span></a>
        <!-- <a class="nav-link actived" href="/#beranda">Beranda <span class="sr-only">(current)</span></a> -->
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/#services">Layanan</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/#teori">Informasi</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/#about">Tentang</a>
      </li>
    </ul>
    <div class="form-inline pr-15 my-2 my-lg-0">
      @auth
        @if (Auth::user()->role == 'petani' || Auth::user()->role == 'pengepul')
          <a class="btn btn-app btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        @else
          <a href="/u/dashboard" class="btn btn-app">Dashboard</a>
        @endif
      @else    
        <a href="/login" class="btn btn-app">Masuk</a>
      @endauth
    </div>
  </div>
</nav>