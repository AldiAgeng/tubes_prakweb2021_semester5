@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update User</h1>
</div>


<div class="col-md-8">
    <form method="post" action="#" class="mb-5">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $user->name) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username', $user->username) }}">
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $user->email) }}">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

        {{-- <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div> --}}

          <div class="mb-3">
            <label for="category" class="form-label">Is Admin?</label>
            <select class="form-select" name="is_admin" id="is_admin">
              @if(old('is_admin', $user->is_admin) == 0)
              <option value="{{ 0 }}" selected>No</option>
              <option value="{{ 1 }}">Yes</option>
              @elseif (old('is_admin', $user->is_admin) == 1)
              <option value="{{ 0 }}">No</option>
              <option value="{{ 1 }}" selected>Yes</option>
              @else
              <option value="{{ 0 }}">No</option>
              <option value="{{ 1 }}">Yes</option>
              @endif
            </select>
          </div>
          
      <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

@endsection