@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-4">
      
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
      <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
        <div class="card-img-left d-none d-md-flex">
          <!-- Background image for card set in CSS! -->
        </div>
        <div class="card-body p-4 p-sm-5">
          <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
          <form action="/login" method="post">
            @csrf
            <div class="form-floating">
              <input type="email" name="email" class="form-control mb-3 @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              <label for="password">Password</label>
            </div>

            <div class="d-grid mb-2">
              <button class="w-100 btn btn-lg button-login text-light" type="submit">Login</button>
            </div>

            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register now!!</a></small>

            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  
@endsection