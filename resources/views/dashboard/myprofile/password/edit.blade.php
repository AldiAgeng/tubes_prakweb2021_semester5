@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Change Password</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="col-md-8">
    <form method="post" action="/dashboard/myprofile/password/edit" class="mb-5">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="current_password" class="form-label">Current Password</label>
          <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required autofocus>
          @error('current_password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">New Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
          @error('password_confirmation')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

          
          
          <button type="submit" class="btn btn-success">Save</button>
          <a href="/dashboard/myprofile" class="btn btn-dark">Cancel</a>
        </form>
</div>

@endsection