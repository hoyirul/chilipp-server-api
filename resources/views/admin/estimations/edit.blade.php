@extends('admin.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">

   <!-- Page Heading -->
   <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">Tambah {{ $title }}</h5>
      <p class="mb-4">Hati-hati dalam input data. Beberapa data tidak dapat diubah setelah diinput!.</p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/u/estimations" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
         <span class="fas fa-arrow-left"></span> Kembali</a>
    </div>
  </div>

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
   <div class="card shadow mb-4 border-0">
      <div class="card-header bg-white py-3">
         <h6 class="m-0 font-weight-bold color-primary">Data {{ $title }}</h6>
      </div>
      <div class="card-body container-fluid">
         <form method="post" action="/u/estimations/{{ $estimations->id }}">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-xl-6 mr-auto">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" required placeholder="Provinsi" class="form-control fs-normal form-spacer-20x15 @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" data-toggle="tooltip" data-placement="right" value="{{ $estimations->provinsi }}">
                @error('provinsi')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-xl-6 ml-auto">
              <div class="form-group">
                <label for="estimasi">Estimasi</label>
                <input type="number" required placeholder="Estimasi" class="form-control fs-normal form-spacer-20x15 @error('estimasi') is-invalid @enderror" id="estimasi" name="estimasi" data-toggle="tooltip" data-placement="right" value="{{ $estimations->estimasi }}">
                @error('estimasi')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
  
            </div>
            
          </div>
         
          <button type="submit" class="btn btn-primary font-medium float-right py-2 px-5">Update</button>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
@endsection