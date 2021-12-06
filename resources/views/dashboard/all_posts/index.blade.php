@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Posts</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="card col-lg-10">
      <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Author</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody class="customtable">
                @foreach ($posts as $post)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->author->name }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                        
                        <a href="/dashboard/all_posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>

@endsection

