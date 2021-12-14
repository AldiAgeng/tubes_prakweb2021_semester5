@extends('layouts.main')


@section('container')

<section class="w-100 text-light mb-4 detail-post-title">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="ml-title pt-3">
          <h3>Detail Post</h3>
          <p>All Review / Detai Review</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="post">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if ($post->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img class="img-fluid" src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->category->name }}">
            </div>
          @else
            <img class="img-fluid" src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" alt="{{ $post->category->name }}">
          @endif
        <div class="text-detail d-inline">
          <p><i class="bi bi-file-earmark-text"></i> <b>Category</b> <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
          <p><i class="bi bi-person"></i> <b>Author</b> <a class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a></p>
          <p><i class="bi bi-calendar3"></i> <b>Date</b></p>
        </div>
        <h1 class="mb-4">{{ $post->title }}</h1>
        <article class="fs-6 text-body">
          {!! $post->body !!}
        </article>
        
        <a href="/posts" class="text-decoration-none d-block mt-3">Back to Posts</a>
      </div>
    </div>
  </div>
</section>

<section class="section-about-author">
  <div class="container mt-5 mb-5 ">
    <h1 class="title-related-posts mb-4 mt-3">About Author</h1>
    <div class="row justify-content-center g-0 about-author mt-3">
      <div class="col-md-2 ">
        <img class="rounded-circle" src="https://source.unsplash.com/200x200?Profile" alt="">
      </div>
      <div class="col-md-6 about-text-author float-start">
        <p class="p-author pt-5"><b>Author</b> {{ $post->author->name }}</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis, veritatis earum. Excepturi tempore beatae consectetur ratione nostrum iusto quo officiis, sapiente ad! Ducimus, sint cum?</p>
      </div>
    </div>
  </div>
</section>

<section class="related-posts">
  <div class="container mt-4">
    <h1 class="title-related-posts mb-5 justify-content-center">Related Posts</h1>
    <div class="card mb-3" style="max-width: 840px;">
      <div class="row justify-content-center g-0">
        <div class="col-sm-4">
          <img src="https://source.unsplash.com/1200x900?Documentary" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-sm-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>

    

    <!-- 2 -->
    <div class="card mb-3" style="max-width: 840px;">
      <div class="row justify-content-center g-0">
        <div class="col-md-4">
          <img src="https://source.unsplash.com/1200x900?Family" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
@endsection