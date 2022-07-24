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
        <a href="/login" class="btn btn-app">Masuk</a>
      </div>
    </div>
  </nav>

  
  <section class="content">
    <!-- MAIN-TOP -->
    <div class="main-top">
      <!-- BANNER -->
      <div id="beranda" class="main-banner">
        <div class="left-banner">
          <h1 class="mb-15">Yuk, Cek estimasi dan biaya pengiriman cabai di chilipp.</h1>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium laboriosam error quidem vitae. Maxime, at iure, ducimus, ipsam quia a beatae tempora vero nam laudantium cupiditate. Eius tempore quidem dignissimos?. </p>
          <div class="text-left"><br>
            <a href="/#services" class="btn btn-app btn-width-same">Mulai</a>
            <!-- <a href="https://drive.google.com/file/d/12QjT4JTkjqFrBDwqT_bMcr89bwLMOyWL/view?usp=sharing" target="_blank" class="btn btn-app btn-width-same">Prototype</a> -->
          </div>
        </div>
        <div class="right-banner">
          <img src="{{ asset('ui/svg/banner/banner-home.svg') }}" class="banner-img mb-10" alt="">
        </div>
      </div>
      <!-- END BANNER -->

      <!-- SERVICES -->
      <div id="services" class="main-services">
        <div class="p-5"></div>
        <div class="title text-center p-3">
          <h3 class="title-head">Layanan Kami</h3>
          <p class="subtitle">Layanan yang bisa di rasakan oleh pengguna Chilipp App.</p>
        </div>
        <div class="p-3"></div>
        <div class="services">
          <div class="row pl-15 pr-15">

            <div class="col-md-4">
              <a href="#" class="link-services">
                <div class="card box-shadow" style="width: 100%; height: auto">
                  <div class="card-body m-2 text-center">
                    <img src="{{ asset('ui/svg/icon/stop-loss.svg') }}" class="mb-4" alt="">
                    <h5 class="title-head mb-4">Pengaturan Stop Loss</h5>
                    <p class="text-justify subtitle">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, mollitia. Officia ipsum porro qui earum, quos velit quam omnis quidem aspernatur impedit libero iste cumque non consequuntur nam facere? Unde.
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-md-4">
              <a href="#" data-toggle="modal" data-target="#exampleModalLong" class="link-services">
                <div class="card box-shadow" style="width: 100%; height: auto">
                  <div class="card-body m-2 text-center">
                    <img src="{{ asset('ui/svg/icon/calculator.svg') }}" class="mb-4" alt="">
                    <h5 class="title-head mb-4">Perhitungan Estimasi</h5>
                    <p class=" text-justify subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, mollitia. Officia ipsum porro qui earum, quos velit quam omnis quidem aspernatur impedit libero iste cumque non consequuntur nam facere? Unde.</p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-md-4">
              <a href="#" class="link-services">
                <div class="card box-shadow" style="width: 100%; height: auto;">
                  <div class="card-body m-2 text-center">
                    <img src="{{ asset('ui/svg/icon/chart-bar.svg') }}" class="mb-4" alt="">
                    <h5 class="title-head mb-4">Prediksi Harga</h5>
                    <p class=" text-justify subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, mollitia. Officia ipsum porro qui earum, quos velit quam omnis quidem aspernatur impedit libero iste cumque non consequuntur nam facere? Unde.</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

      </div>
      <!-- END SERVICES -->

    </div>
    <!-- END MAIN-TOP -->

    <!-- ABOUT -->
    <div id="teori" class="teori">
      <div class="p-5"></div>
      <div class="title text-center p-3">
        <h3 class="title-head">Informasi Harga Cabai</h3>
        <p class="subtitle">Informasi tentang prediksi harga cabai.</p>
      </div>
      <div class="p-3"></div>
      <div class="left-teori">
        <img src="{{ asset('ui/svg/banner/banner-predict.svg') }}" class="teori-img" alt="">
      </div>
      <div class="right-teori text-right">
        <div class="p-3"></div>
        <h4 class="title-head text-left">Informasi Harga</h4>
        <div class="item-teori">
          <p style="text-indent: 50px;" class="text-justify subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit rerum repellat sequi, esse in quisquam! Eum omnis iusto excepturi neque maxime officia aliquid est at, ullam delectus explicabo distinctio illo. Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quia itaque mollitia. Voluptates nemo, hic nisi aliquam placeat sunt tempore laudantium fugit possimus magnam dolore at quia cum aliquid quasi?</p>
          <p style="text-indent: 50px;" class="text-justify subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, laborum soluta placeat beatae inventore officiis neque temporibus voluptatem perspiciatis assumenda delectus dolor aspernatur, accusantium alias sit quod, enim sapiente iure!</p><br>
          <a target="_blank" href="https://www.halodoc.com/kesehatan/diabetes" class="btn btn-app btn-contact">Selengkapnya</a>
        </div>
        </div>
      </div>
    </div>
    <!-- END ABOUT -->

    <!-- MAIN BOTTOM -->
    <div class="main-bottom">
      <!-- TEAM -->
      <div id="team" class="main-team">
        <div class="p-5"></div>
        <div class="title text-center p-3">
          <h3 class="title-head">Tim Kami</h3>
          <p class="subtitle">Tim kami mengenai founder dan sekaligus pemilik perusahaan.</p>
        </div>
        <div class="p-3"></div>
        <div class="team">
          <div class="row pl-15 pr-15">

            <div class="col-md-4 text-center">
              <a href="#" target="_blank" class="link-team">
                <img src="http://satvision.in/wp-content/uploads/2019/06/user.jpg" class="img-circle" alt="">
              </a>
              <!-- <div class="p-2"></div> -->
              <h6>Team 1</h6>
              <p>Chief Executive Officer</p>
            </div>

            <div class="col-md-4 text-center">
              <a href="#" target="_blank" class="link-team">
                <img src="https://www.aucshow.com/assets/frontend/global/img/users/9.jpg" class="img-circle" alt="">
              </a>
              <!-- <div class="p-2"></div> -->
              <h6>Team 2</h6>
              <p>Chief Technology Officer</p>
            </div>

            <div class="col-md-4 text-center">
              <a href="#" target="_blank" class="link-team">
                <img src="https://dentalia.orionthemes.com/demo-1/wp-content/uploads/2016/10/dentalia-demo-deoctor-5-1-750x750.jpg" class="img-circle" alt="">
                <!-- <div class="p-2"></div> -->
              </a>
              <h6>Team 3</h6>
              <p>Chief Information Officer</p>
            </div>

          </div>
        </div>
      </div>
      <!-- END TEAM -->

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
<script src="./ui/js/nav.js"></script>
<script src="./ui/js/navigation.js"></script>

<script>
  $(document).ready(function() {
    $('#basic-table').DataTable();
    //$('select').select2();
  });
</script>
</body>
</html>