@extends('admin.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">
  <!-- Page Heading -->
  <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">{{ $title }} - {{ auth()->user()->email }}</h5>
      <p class="mb-4">Hati-hati dalam input data. Tolong di perhatikan dengan teliti!.</p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/u/change_password" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
        <span class="fas fa-cogs"></span> Pengaturan</a>
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
  <div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
      <h6 class="m-0 font-weight-bold color-primary">Data {{ $title }}</h6>
    </div>
    <div class="card-body container-fluid">
      <form method="post" action="/u/update_profile" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-xl-6 mr-auto">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" readonly placeholder="Email" class="form-control fs-normal form-spacer-20x15 @error('email') is-invalid @enderror" id="email" name="email" data-toggle="tooltip" data-placement="right" value="{{ $user->email }}">
              @error('email')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <input type="text" placeholder="Role" readonly class="form-control fs-normal form-spacer-20x15 @error('role') is-invalid @enderror" id="role" name="role" data-toggle="tooltip" data-placement="right"  value="{{ Auth::user()->role }}">
              @error('role')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-xl-6 ml-auto">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" placeholder="Nama Lengkap" class="form-control fs-normal form-spacer-20x15 @error('nama') is-invalid @enderror" id="nama" name="nama" data-toggle="tooltip" data-placement="right"  value="{{ $user->nama }}">
              @error('nama')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" placeholder="Alamat" class="form-control fs-normal form-spacer-20x15 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" data-toggle="tooltip" data-placement="right" value="{{ $user->alamat }}">
                @error('alamat')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>

          </div>
          
        </div>

        <button type="submit" class="btn py-2 px-5 float-right font-medium btn-primary">Update</button>
            
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection