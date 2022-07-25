@extends('pages.layouts.main')
  
@section('content')
  <section class="content">
    <!-- MAIN-TOP -->
    <div class="main-top">
      <!-- BANNER -->
      @include('pages.partials.banner.banner-news')
      <!-- END BANNER -->

      <!-- SERVICES -->
      <div id="news" class="main-news">
        <div class="p-5"></div>
        <div class="title text-center p-3">
          <h3 class="title-head">Harga Estimasi Chilipp</h3>
          <p class="subtitle">Harga estimasi adalah rata-rata biaya pengiriman perprovinsi.</p>
        </div>
        <div class="p-3"></div>
        <div class="news">
          <div class="row pl-15 pr-15">

            @foreach ($estimations as $item)
              <div class="col-md-3 mb-4">
                <div class="card bg-primary border-0 box-shadow" style="width: 100%; height: auto">
                  <div class="card-body m-2 text-center">
                    <h5 class="title-head text-white mb-4">Rp. {{ $item->estimasi }} Perkilogram</h5>
                    <p class="text-white text-center subtitle">
                      {{ $item->provinsi }}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>

        <div class="p-5"></div>

        <div class="title text-center p-3">
          <h3 class="title-head">Berita Harga Pasar</h3>
          <p class="subtitle">Berita harga adalah sebuah berita terkini dari pasar terkait.</p>
        </div>
        <div class="p-3"></div>
        <div class="news">
          <div class="row pl-15 pr-15">

            @foreach ($news as $item)
              <div class="col-md-3 mb-4">
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

          {{-- @if ($news->count() > 1)
            <a href="/news/" class="float-right pr-15">Test</a>
          @endif --}}
        </div>

      </div>
      <!-- END SERVICES -->
    </div>
    <!-- END MAIN-TOP -->

    <!-- MAIN BOTTOM -->
    <div class="main-bottom">
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