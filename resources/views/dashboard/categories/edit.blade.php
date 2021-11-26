@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Category</h1>
</div>


<div class="col-md-8">
    <form method="post" action="/dashboard/categories/{{ $categories->slug }}" class="mb-5">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name Category</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ @old('name', $categories->name) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ @old('slug', $categories->slug) }}">
            @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
      <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

<script>
    // Sluggable
const name = document.querySelector('#name');
const slug = document.querySelector('#slug');

name.addEventListener('change', function (){
  fetch('/dashboard/categories/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});
</script>

@endsection