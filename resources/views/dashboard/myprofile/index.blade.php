@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">MyProfile</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif



<div class="col-md-8">
  @if(auth()->user()->avatar==null)
  <h5>No Image, Please upload your image</h5>
  @else
  <img style="height: 150px; width: 150px;" class="img-responsive rounded-circle" src="{{ asset('storage/' .auth()->user()->avatar) }}">
  @endif
  <div class="mb-3 mt-3">
    <a href="/dashboard/myprofile/edit" class="btn btn-primary mb-2">Edit MyProfile</a>
    <a href="/dashboard/myprofile/password/edit" class="btn btn-primary mb-2">Change Password</a>
  </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <p class="form-control" id="name" name="name">{{ auth()->user()->name }}</p>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <p class="form-control" id="username" name="username">{{ auth()->user()->username }}</p>
          </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <p class="form-control" id="email" name="email">{{ auth()->user()->email }}</p>
        </div>
        
        @if(!auth()->user()->bio==null)
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <p class="form-control" id="bio" name="bio">{{ auth()->user()->bio }}</p>
        </div>
        @else
        <div class="mb-3">
              <label for="bio" class="form-label">Bio</label>
              <p class="form-control" id="bio" name="bio">No Bio</p>
        </div>
        @endif
</div>

@endsection