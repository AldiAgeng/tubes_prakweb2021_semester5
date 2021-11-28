@extends('layouts.main')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
      <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
        <div class="card-img-left d-none d-md-flex">
          <!-- Background image for card set in CSS! -->
        </div>
        <div class="card-body p-4 p-sm-5">
          <h5 class="card-title text-center mb-5 fw-light fs-5">Registration</h5>
          <form action="/register" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control mb-2 rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value={{ old('name') }}>
              <label for="name">Name</label>
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="username" class="form-control mb-2 @error('username') is-invalid @enderror" id="username" placeholder="Username" required value={{ old('username') }}>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="form-floating">
              <input type="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value={{ old('email') }}>
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="form-floating">
              <input type="password" name="password" class="form-control mb-2 rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
              <label for="password">Password</label>
              @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="d-grid mb-2">
              <button class="w-100 btn btn-lg button-login text-light" type="submit">Register</button>
            </div>

            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection