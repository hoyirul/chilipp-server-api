@extends('pages.layouts.main')
  
@section('content')
  <section class="content">
    <!-- MAIN-TOP -->
    <div class="main-top">
      <!-- BANNER -->
      @include('pages.partials.banner.banner-home')
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
          <a href="/news" class="btn btn-app btn-contact">Selengkapnya</a>
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
                <img src="{{ asset('ui/img/team/2041720074.png') }}" class="img-circle" alt="">
              </a>
              <!-- <div class="p-2"></div> -->
              <h6>Mochammad Hairullah</h6>
              <p>Chief Executive Officer</p>
            </div>

            <div class="col-md-4 text-center">
              <a href="#" target="_blank" class="link-team">
                <img src="{{ asset('ui/img/team/2041720006.png') }}" class="img-circle" alt="">
              </a>
              <!-- <div class="p-2"></div> -->
              <h6>Iftitah Hidayati</h6>
              <p>Chief Technology Officer</p>
            </div>

            <div class="col-md-4 text-center">
              <a href="#" target="_blank" class="link-team">
                <img src="{{ asset('ui/img/team/2041720218.png') }}" class="img-circle" alt="">
                <!-- <div class="p-2"></div> -->
              </a>
              <h6>Satriya Rifki P.</h6>
              <p>Chief Information Officer</p>
            </div>

          </div>
        </div>
      </div>
      <!-- END TEAM -->

      <!-- ABOUT -->
      @include('pages.partials.about')
      <!-- END ABOUT -->
      <br>
    
      <div class="p-3"></div>
      <!-- FOOTER -->
      @include('pages.partials.footer')
      <!-- END FOOTER -->
    </div>
    <!-- END MAIN BOTTOM -->

  </section>
@endsection