@extends('admin.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">
  <!-- Page Heading -->
  <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">Edit Data {{ $title }}</h5>
      <p class="mb-4">Hati-hati dalam input data. Tolong di perhatikan dengan teliti!.</p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/u/admins" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
        <span class="fas fa-arrow-left"></span> Kembali</a>
    </div>
  </div>
  <!-- DataTales Example -->
  <div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
      <h6 class="m-0 font-weight-bold color-primary">Data {{ $title }}</h6>
    </div>
    <div class="card-body container-fluid">
      <form method="post" action="{{ url('/u/admins/'.$users->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-xl-6 mr-auto">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" placeholder="Email" readonly class="form-control fs-normal form-spacer-20x15 @error('email') is-invalid @enderror" id="email" name="email" data-toggle="tooltip" data-placement="right" value="{{ $users->email }}">
              @error('email')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" readonly placeholder="Password" class="form-control fs-normal form-spacer-20x15 @error('password') is-invalid @enderror" value="12345678" id="password" name="password" data-toggle="tooltip" data-placement="right">
              @error('password')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input type="password" readonly placeholder="Konfirmasi Password" class="form-control fs-normal form-spacer-20x15 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="12345678" name="password_confirmation" data-toggle="tooltip" data-placement="right">
              @error('password_confirmation')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-xl-6 ml-auto">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" placeholder="Nama Lengkap" class="form-control fs-normal form-spacer-20x15 @error('nama') is-invalid @enderror" id="nama" name="nama" data-toggle="tooltip" data-placement="right"  value="{{ $users->nama }}">
              @error('nama')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" placeholder="Alamat" class="form-control fs-normal form-spacer-20x15 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" data-toggle="tooltip" data-placement="right" value="{{ $users->alamat }}">
                @error('alamat')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <select id="role" name="role" placeholder="Nama Bayi" class="form-control-select fs-normal form-spacer-10x8 @error('role') is-invalid @enderror" data-toggle="tooltip" data-placement="right">
                <option value="as" disabled selected>Pilih role</option>
                  <option value="admin" {{ ($users->role == 'admin') ? 'selected' : '' }}>Admin</option>
                  <option value="pasar" {{ ($users->role == 'pasar') ? 'selected' : '' }}>Pasar</option>
                  <option value="pengepul" {{ ($users->role == 'pengepul') ? 'selected' : '' }}>Pengepul</option>
                  <option value="petani" {{ ($users->role == 'petani') ? 'selected' : '' }}>Petani</option>
              </select>
              {{-- <input type="text" placeholder="Role" readonly class="form-control fs-normal form-spacer-20x15 @error('role') is-invalid @enderror" id="role" name="role" data-toggle="tooltip" data-placement="right"  value="{{ 'admin' }}"> --}}
              @error('role')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
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