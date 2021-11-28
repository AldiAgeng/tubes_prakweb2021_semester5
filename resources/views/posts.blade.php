@extends('layouts.main')
@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts">

      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
      @endif

      @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      
      {{-- <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-danger" type="submit">Search</button>
      </div> --}}
    </form>
  </div>
</div>

@if($posts->count())
<div class="container">
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-4 mb-3">
          <div class="team-area mt-5 justify-content-center">
              <div class="single-team">
                @if ($post->image)
                  <img src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->category->name }}" class="float-start" alt="{{ $post->category->name }}">
                @else
                  <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                @endif
                <div class="team-text">
                  <h2>Review {{ $post->title }}</h2>
                  <p>{{ $post->category->name }}</p>
                  <a href="/posts/{{ $post->slug }}" class="button text-decoration-none p-2">Read More</a>
                </div>
              </div>
          </div>
      </div>
    @endforeach
  </div>
</div>
@else
  <p class="text-center fs-4">No Post Found.</p>
@endif

<div class="d-flex justify-content-end">
  {{ $posts->links() }}
</div>

@endsection
