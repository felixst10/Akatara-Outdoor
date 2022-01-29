@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div>
  
  <div class="col-lg-8">
    <form method="post" action="/admin/users/{{ $user->id }}">
      @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" @error('name') is-invalid @enderror id="name" 
          name="name" required autofocus value="{{ old('name', $user->name) }}">
          @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control"  @error('email') is-invalid @enderror id="email"
             name="email" required value="{{ old('email', $user->email) }}">
             @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="text" class="form-control"  @error('password') is-invalid @enderror id="password"
           name="password" required value="{{ old('password', $user->password) }}">
           @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
      </form>
  </div>

  <script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')

    title.addEventListener('change', function(){
      fetch('/admin/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault()
    })
  </script>
@endsection