@extends('pages.layouts.main')

@section('content')
  <div class="row main mb-1">
    <div class="col-md-12 mb-3">
      <a href="/user/transaction" class="text-decoration-none float-end text-dark"><span class="fa fa-chevron-left me-1"></span> Back</a>
      <h5 class="float-start font-semibold">{{ $title = 'Transaction Detail - '.$orders->id }}</h5>
    </div>

    @foreach ($order_details as $item)
      <div class="col-md-3 mb-3">
        <div class="card w-100 border-0 rad-10">
          <div class="cover p-3">
            <img src="{{ asset('storage/'.$item->book->cover_image) }}" class="card-img-top h-64 w-full object-cover rounded-lg">
          </div>
          <div class="card-body top-20">
            <h6 class="font-medium">{{ $item->book->title }}</h6>
            <p class="top-6 color-grey fs-small text-grey font-regular"><b class="font-medium text-dark">GENRE</b> - {{ strtoupper($item->book->genre->genre) }}</p>
            <span class="float-start text-danger fs-normal mt-1">{{ $item->qty }} x Rp. {{ number_format($item->book->price) }}</span>
            <span class="float-end font-semibold">{{ $item->subtotal / 1000 }}K</span>
          </div>
        </div>
      </div>
    @endforeach

  </div>

  <h4 class="float-start font-semibold mt-3">Total : Rp. {{ number_format($total) }}.00,-</h4>
  <a href="/user/transaction/{{ $orders->id }}/print" target="_blank" class="btn btn-danger fs-medium p-2 float-end font-regular rad-8 px-5"><span class="fa fa-print me-1"></span> Print Struk</a>
  <br>
@endsection