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
      @if ($title == 'Admins')          
        <a href="/u/users/create" class="btn btn-primary py-2 px-3 fs-normal float-right mb-3 shadow-sm"><span class="fas fa-user-plus"></span> Tambah Data</a>
      @endif
      
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">NO</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <td> Role</td>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $row)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $row->nama }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ ($row->alamat == NULL) ? 'NULL' : $row->alamat }}</td>
              <td class="text-center">
                  <span class="btn fs-small btn-info text-decoration-none">
                    {{-- <span class="fa fa-fw fa-syringe mx-1"></span> --}}
                    {{ $row->role }}
                  </span>
              </td>
              <td class="text-center">
                <a href="/u/admins/{{ $row->id }}/edit" class="btn btn-info btn-sm fs-small">Edit</a>
              </td>
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
