@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit All-Post</h1>
</div>

<div class="col-md-8">
  <form method="post" action="/dashboard/all_posts/{{ $all_post->slug }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ @old('title', $all_post->title) }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $all_post->slug)  }}">
        @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id" id="category">
          @foreach ($categories as $category)
          @if(old('category_id', $all_post->category_id) == $category->id)
          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
          @endforeach
        </select>
      </div>

      <div class="mb-3">
          <label for="image" class="form-label">Post Image</label>
          <input type="hidden" name="oldImage" value="{{ $all_post->image }}">
          @if ($all_post->image)
              <img src="{{ asset('storage/' .$all_post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
          @else
              <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

      <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
            <p class="text-danger">{{ $message }}</p>
          @enderror
              <input id="body" type="hidden" name="body" value="{{ old('body', $all_post->body) }}">
              <trix-editor input="body"></trix-editor>         
        </div>
      
      
      <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
  
</div>

<script>
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function (){
  fetch('/dashboard/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});

document.addEventListener('trix-file-accept', function(){
  e.preventDefault();
});

// Image Preview
function previewImage() {
  const image = document.querySelector("#image");
  const imgPreview = document.querySelector(".img-preview");
  
  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function (oFREEvent) {
    imgPreview.src = oFREEvent.target.result;
  }
}
</script>

@endsection