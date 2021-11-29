@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
  </div>

@can('admin')
  
<div class="row">
  <div class="col mt-2">
    <a class="text-decoration-none text-dark" href="/dashboard/all_posts">
      <div class="card">
          <div class="card-body text-center">
            <i class="bi bi-file-text" style="font-size:4em;"></i>
            <p class="card-text">All Post</p>
            <h5 class="card-title">Total: {{ $posts->count() }}</h5>
          </div>
        </div>
    </a>
  </div>
  <div class="col mt-2">
    <a class="text-decoration-none text-dark" href="/dashboard/categories">
      <div class="card">
          <div class="card-body text-center">
            <i class="bi bi-grid" style="font-size:4em;"></i>
            <p class="card-text">Post Categories</p>
            <h5 class="card-title">Total: {{ $categories->count() }}</h5>
          </div>
        </div>
    </a>
  </div>
  <div class="col mt-2">
    <a class="text-decoration-none text-dark" href="/dashboard/posts">
      <div class="card">
          <div class="card-body text-center">
            <i class="bi bi-people" style="font-size:4em;"></i>
            <p class="card-text">Users</p>
            <h5 class="card-title">Total: {{ $user->count() }}</h5>
          </div>
        </div>
    </a>
  </div>
  <div class="col mt-2">
    <a class="text-decoration-none text-dark" href="/dashboard/posts">
      <div class="card">
          <div class="card-body text-center">
            <i class="bi bi-person-check" style="font-size:4em;"></i>
            <p class="card-text">Admin</p>
            <h5 class="card-title">Total: {{ $admin->count() }}</h5>
          </div>
        </div>
    </a>
  </div>
</div>

@endcan
@endsection