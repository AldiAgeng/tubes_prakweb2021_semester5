@extends('layouts.main')


@section('container')

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
          <p><i class="bi bi-file-earmark-text"></i> <b>Category</b> <a class="text-decoration-none text-dark" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
          <p><i class="bi bi-person"></i> <b>Author</b> <a class="text-decoration-none text-dark" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a></p>
          <p><i class="bi bi-calendar3"></i> <b>{{ $post->created_at->diffForHumans() }}</b></p>
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
    <h1 class="title-related-posts mb-3 mt-3">About Author</h1>
    <div class="row justify-content-center g-0 about-author mt-3">
      <div class="col-md-2 ">
        <img class="rounded-circle" src="https://i.pravatar.cc/200" alt="">
      </div>
      <div class="col-md-6 about-text-author float-start">
        <p class="p-author pt-5"><b>{{ $post->author->name }}</b></p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis, veritatis earum. Excepturi tempore beatae consectetur ratione nostrum iusto quo officiis, sapiente ad! Ducimus, sint cum?</p>
      </div>
    </div>
  </div>
</section>

@if($related->isEmpty())
<section class="related-posts">
    <div class="container mt-4">
      
    </div>
</section>
@else
<section class="related-posts">
  <div class="container mt-4">
    <h1 class="title-related-posts mb-3 justify-content-center">Related Posts</h1>
    <div class="card mb-3" style="max-width: 840px;">
      <div class="row justify-content-center g-0">
        <div class="col-sm-4">
          <img src="https://source.unsplash.com/1200x900?Documentary" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-sm-8">
          <div class="card-body">
            <?php 
            $random = $related->random()
            ?>
            <a  class="text-decoration-none text-dark" href="/posts/{{ $random->slug }}"><h5 class="card-title">{{ $random->title }}</h5></a>
            <p class="card-text">{{ $random->excerpt }}</p>
            <p class="card-text"><small class="text-muted">{{ $random->created_at->diffForHumans() }}</small></p>
          </div>
        </div>
      </div>
    </div>
@endif

  </div>
</section>
  
@endsection