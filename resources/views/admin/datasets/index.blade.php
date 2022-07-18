@extends('admin.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">

  <!-- Page Heading -->
  <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>

  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
  @if(session('danger'))
  <div class="alert alert-danger">
    {{session('danger')}}
  </div>
  @endif

  <!-- DataTales Example -->
  <div class="card shadow mb-5 border-0">
    <div class="card-body">
      <h5 class="m-0 font-weight-bold color-primary mb-2">Tabel Data {{ $title }}</h5>
      <p class="mb-3 float-left">Halaman ini untuk pengelolaan {{ strtolower($title) }}</p>
      
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">NO</th>
              <th>Nama</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Permintaan (kg)</th>
              <th class="text-center">Ketersediaan (kg)</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Berita</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataset as $row)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $row->user->nama }}</td>
              <td>{{ $row->tanggal }}</td>
              <td class="text-center">{{ number_format($row->permintaan) }} Kilogram</td>
              <td class="text-center">{{ number_format($row->ketersediaan) }} Kilogram</td>
              <td>Rp. {{ number_format($row->harga) }}</td>
              <td>{{ $row->berita }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
