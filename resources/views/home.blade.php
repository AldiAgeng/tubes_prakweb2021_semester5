@extends('layouts.main')
@section('container')

{{-- Bagian Head --}}
@if ($posts->count())    
@endif
<div class="container card-pembungkus mt-3">
  <div class="row isi">
    @if ($posts[0]->image)
    <div class="gambar">
        <img src="{{ asset('storage/' .$posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="float-start" alt="{{ $posts[0]->category->name }}">
      </div>
    @else
    <div class="gambar">
        {{-- <img src="../img/sriasih.jpg" class="float-start" alt=""> --}}
      <img src="https://source.unsplash.com/600x800?{{ $posts[0]->category->name }}" class="float-start" alt="{{ $posts[0]->category->name }}">
    </div>
    @endif

    <div class="col-sm-6 keterangan mt-2">
      <h1 class="fw-bold">Review {{ $posts[0]->title }}</h1>
      <ul class="mt-4 fw-bold">
        <li><i class="bi bi-calendar3"></i> {{ $posts[0]->created_at->diffForHumans() }}</li>
        <li><a class="text-decoration-none text-dark" href="/posts?author={{ $posts[0]->author->username }}"><i class="bi bi-people"></i> {{ $posts[0]->author->name }}</a></li>
        {{-- <!-- <li><i class="bi bi-eye"></i> 15k Views</li> --}}
      </ul>
      <p class="mt-4 mb-4">{{ $posts[0]->excerpt }}</p>

      <a href="/posts/{{ $posts[0]->slug }}" class="button text-decoration-none p-2">Read More</a>
    </div>
  </div>
</div>
{{-- END HEAD --}}

<!-- Body -->
{{-- Category --}}
<div class="container mt-5">
<div class="row body">
  <h1 class="category">Browse by category</h1>
  <div class="col-sm-4 category mt-3">
    @foreach ($categories as $category)
    <a href="/posts?category={{ $category->slug }}" type="button" class="btn">{{ $category->name }}</a>
    @endforeach
  </div>
  {{-- END Category --}}


{{-- Posts --}}
  <h1 class="mt-5 new-review">New Review</h1>
  <div class="container">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="team-area mt-4 justify-content-center">
                <div class="single-team">
                  @if ($posts[1]->image)
                    <img src="{{ asset('storage/' .$posts[1]->image) }}" alt="{{ $posts[1]->category->name }}" class="float-start" alt="{{ $posts[1]->category->name }}">
                  @else
                    <img src="https://source.unsplash.com/500x400?{{ $posts[1]->category->name }}" alt="{{ $posts[1]->category->name }}">
                  @endif
                  <div class="team-text">
                    <h2>Review {{ $posts[1]->title }}</h2>
                    <p>{{ $posts[1]->category->name }}</p>
                    <a href="/posts/{{ $posts[1]->slug }}" class="button text-decoration-none p-2">Read More</a>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="team-area mt-4 justify-content-center">
              <div class="single-team">
                @if ($posts[2]->image)
                  <img src="{{ asset('storage/' .$posts[2]->image) }}" alt="{{ $posts[2]->category->name }}" class="float-start" alt="{{ $posts[2]->category->name }}">
                @else
                  <img src="https://source.unsplash.com/500x400?{{ $posts[2]->category->name }}" alt="{{ $posts[2]->category->name }}">
                @endif
                <div class="team-text">
                  <h2>Review {{ $posts[2]->title }}</h2>
                  <p>{{ $posts[2]->category->name }}</p>
                  <a href="/posts/{{ $posts[2]->slug }}" class="button text-decoration-none p-2">Read More</a>
                </div>
              </div>
          </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="team-area mt-4 justify-content-center">
            <div class="single-team">
              @if ($posts[3]->image)
                <img src="{{ asset('storage/' .$posts[3]->image) }}" alt="{{ $posts[3]->category->name }}" class="float-start" alt="{{ $posts[3]->category->name }}">
              @else
                <img src="https://source.unsplash.com/500x400?{{ $posts[3]->category->name }}" alt="{{ $posts[3]->category->name }}">
              @endif
              <div class="team-text">
                <h2>Review {{ $posts[3]->title }}</h2>
                <p>{{ $posts[3]->category->name }}</p>
                <a href="/posts/{{ $posts[3]->slug }}" class="button text-decoration-none p-2">Read More</a>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Footer -->

<script>
  gsap.from(".gambar", {
    duration:2,
    x: -190,
    ease: 'elastic.out(2, 0.5)',
    opacity: 0, 
    scale: 0.5
    });

  gsap.registerPlugin(ScrollTrigger);
  gsap.from('.single-team', {
    scrollTrigger: '.single-team',
    x: -400,
    duration: 3,
    scale: 0.5,
    opacity: 0,
  });
</script>

@endsection
