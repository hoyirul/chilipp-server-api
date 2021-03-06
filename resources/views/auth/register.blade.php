@extends('auth.layouts.main')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              {{-- <div class="p-3"></div> --}}
              <div class="card shadow-sm border-0 rounded-lg mt-4 rad-20">
                <div class="card-body m-3">
                  <h3 class="text-center font-weight-light my-4 mb-5 color-primary font-semibold">Chilipp App</h3>
                  <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3 fs-normal">
                      <label for="nama">Name</label>
                      <input id="nama" type="text" class="form-control form-spacer-25x20 rad-10 fs-normal @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus placeholder="Nama">
                      @error('nama')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-floating mb-3 fs-normal">
                      <label for="email">Email address</label>
                      <input id="email" type="email" class="form-control form-spacer-25x20 rad-10 fs-normal @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-floating mb-3 fs-normal">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control rad-10 form-spacer-25x20 fs-normal @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-floating mb-3 fs-normal">
                      <label for="password_confirmation">Password Confirmation</label>
                      <input id="password_confirmation" type="password" class="form-control rad-10 form-spacer-25x20 fs-normal @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password_confirmation" placeholder="Password Confirmation">
                      @error('password_confirmation')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-floating mb-3 fs-normal">
                      <label for="password_confirmation">Password Confirmation</label>
                      <select id="role" name="role" placeholder="Nama Bayi" class="form-control-select rad-10 fs-normal form-spacer-10x8 @error('role') is-invalid @enderror" data-toggle="tooltip" data-placement="right">
                        <option value="as" disabled selected>Pilih role</option>
                          <option value="pasar">Pasar</option>
                          <option value="pengepul">Pengepul</option>
                          <option value="petani">Petani</option>
                      </select>
                      @error('password_confirmation')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-check mb-3 fs-normal">
                      <input class="form-check-input" name="remember" id="inputRememberPassword" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                      <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      
                      <a class="small color-primary text-decoration-none" href="/login">
                          <span class="fas fa-arrow-left px-2"></span>
                          {{ __('Login') }}
                      </a>
                      
                      <button type="submit" class="btn btn-primary py-2 px-5 rad-10 font-medium">
                          {{ __('Register') }}
                      </button>
                    </div>
                    <p class="fs-small text-danger mt-3 text-center">Untuk role admin silahkan menguhubungi developer! <span class="text-primary">support@chilipp.com</span></p>
                    {{-- <div class="p-3"></div> --}}
                  </form>
                {{-- </div> --}}
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

  </div>
@endsection
