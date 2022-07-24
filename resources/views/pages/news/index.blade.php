<!DOCTYPE html>
<html lang="en">

<head>
  <title>Chilipp App 2022 | Chilipp Sahabat Masyarakat.</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('ui/style/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <style>
    .-item{
      margin: 0 !important;
    }
  </style>
</head>

<body>
  <nav id="head" class="navbar nav navbar-expand-lg fixed-top" onscroll="Scroll()">
    <div class="nav-box">
    </div>
    <a class="navbar-brand" href="#"><b class="brand-var">Chilipp</b></a>
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

  
<section class="content">
  <!-- MAIN-TOP -->
  <div class="main-top">
    <!-- BANNER -->
    <div id="beranda" class="main-banner">
      <div class="left-banner">
        <h1 class="mb-15">Yuk, Cek berita dan biaya pengiriman cabai di chilipp.</h1>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium laboriosam error quidem vitae. Maxime, at iure, ducimus, ipsam quia a beatae tempora vero nam laudantium cupiditate. Eius tempore quidem dignissimos?. </p>
        <div class="text-left"><br>
          <a href="/#services" class="btn btn-app btn-width-same">Mulai</a>
          <!-- <a href="https://drive.google.com/file/d/12QjT4JTkjqFrBDwqT_bMcr89bwLMOyWL/view?usp=sharing" target="_blank" class="btn btn-app btn-width-same">Prototype</a> -->
        </div>
      </div>
      <div class="right-banner">
        <img src="{{ asset('ui/svg/banner/banner-news.svg') }}" class="banner-img mb-10" alt="">
      </div>
    </div>
    <!-- END BANNER -->

    <!-- SERVICES -->
    <div id="news" class="main-news">
      <div class="title text-center p-3">
        <h3 class="title-head">Harga Estimasi Chilipp</h3>
        <p class="subtitle">Layanan yang bisa di rasakan oleh pengguna Chilipp App.</p>
      </div>
      <div class="p-3"></div>
      <div class="news">
        <div class="row pl-15 pr-15">

          <div class="col-md-3">
            <div class="card bg-primary border-0 box-shadow" style="width: 100%; height: auto">
              <div class="card-body m-2 text-center">
                <h5 class="title-head text-white mb-4">Rp. 1.250 perkilogram</h5>
                <p class="text-white text-center subtitle">
                  DKI Jakarta
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card bg-primary border-0 box-shadow" style="width: 100%; height: auto">
              <div class="card-body m-2 text-center">
                <h5 class="title-head text-white mb-4">Rp. 1.250 perkilogram</h5>
                <p class="text-white text-center subtitle">
                  Jawa Barat
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card bg-primary border-0 box-shadow" style="width: 100%; height: auto">
              <div class="card-body m-2 text-center">
                <h5 class="title-head text-white mb-4">Rp. 1.250 perkilogram</h5>
                <p class="text-white text-center subtitle">
                  Jawa Tengah
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card bg-primary border-0 box-shadow" style="width: 100%; height: auto">
              <div class="card-body m-2 text-center">
                <h5 class="title-head text-white mb-4">Rp. 1.250 perkilogram</h5>
                <p class="text-white text-center subtitle">
                  Jawa Timur
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="p-5"></div>

      <div class="title text-center p-3">
        <h3 class="title-head">Berita Harga Pasar</h3>
        <p class="subtitle">Layanan yang bisa di rasakan oleh pengguna Chilipp App.</p>
      </div>
      <div class="p-3"></div>
      <div class="news">
        <div class="row pl-15 pr-15">

          @foreach ($news as $item)
            <div class="col-md-3">
              <div class="card box-shadow" style="width: 100%; height: auto">
                <div class="card-body m-2 text-center">
                  <h5 class="title-head mb-4">Rp. {{ number_format($item->harga) }} perkilogram</h5>
                  <p class="text-primary text-center subtitle">
                    Pasar {{ $item->user->nama }} <br>
                    <span class="subtitle"> Ketersediaan {{ number_format($item->ketersediaan) }} kilogram
                    {{ round(($item->ketersediaan/1000), 2) }} ton</span>
                  </p>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>

    </div>
    <!-- END SERVICES -->
  </div>
  <!-- END MAIN-TOP -->

  <!-- MAIN BOTTOM -->
  <div class="main-bottom">

    <!-- ABOUT -->
    <div id="about" class="about">
      <div class="p-5"></div>
      <div class="title text-center p-3">
        <h3 class="title-head">Tentang Kami</h3>
        <p class="subtitle">Tentang aplikasi, informasi dan kontak Chilipp Application.</p>
      </div>
      <div class="p-3"></div>
      <div class="left-about">

        <div class="p-3"></div>
        <h4 class="title-head text-left">Tentang Chilipp App</h4>
        <p style="text-indent: 50px;" class="text-justify subtitle">Lorem ipsum dolor sit amet,consectetur adipisicing elit, sed do ei tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        {{-- <h4 class="title-head text-left">Docs</h4>
        <p style="text-indent: 50px;" class="text-justify subtitle">Lorem ipsum dolor sit amet,consectetur adipisicing elit</p> --}}
        <div class="text-left"><br>
          <a target="_blank" href="#" class="btn btn-app btn-contact">Kontak Kami</a>
        </div>
      </div>
      <div class="right-about text-right">
        <img src="{{ asset('ui/svg/banner/banner-about.svg') }}" class="about-img" alt="">
      </div>
    </div>
    <!-- END ABOUT -->
    <br>
  
    <div class="p-3"></div>
    <!-- FOOTER -->
    <footer class="text-center">
      <p class="text-dark">© 2022 Chilipp | Chilipp is a trademark of Mahasiswa Polinema</p>
    </footer>
    <!-- END FOOTER -->
  </div>
  <!-- END MAIN BOTTOM -->

  </section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script src="{{ asset('ui/js/nav.js') }}"></script>
<script src="{{ asset('ui/js/navigation.js') }}"></script>

<script>
  $(document).ready(function() {
    $('#basic-table').DataTable();
    //$('select').select2();
  });
</script>
</body>
</html>