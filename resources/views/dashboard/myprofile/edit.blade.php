@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit MyProfile</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="col-md-8">
    <form method="post" action="/dashboard/myprofile/edit/{{ auth()->user()->username }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', auth()->user()->name) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username', auth()->user()->username) }}">
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', auth()->user()->email) }}">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input type="hidden" name="oldImage" value="{{ auth()->user()->avatar }}">
            <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" onchange="previewImage()">
            @error('avatar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control @error('bio') is-invalid @enderror" rows="3" id="bio" name="bio" required value="{{ old('bio', auth()->user()->bio) }}">{{ old('bio', auth()->user()->bio) }}</textarea>
            @error('bio')
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

          
          
          <button type="submit" class="btn btn-success">Save</button>
          <a href="/dashboard/myprofile" class="btn btn-dark">Cancel</a>
        </form>
</div>


<script>
// Image Preview
function previewImage() {
  const image = document.querySelector("#avatar");
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