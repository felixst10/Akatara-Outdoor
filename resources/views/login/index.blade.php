@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('LoginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('LoginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <main class="form-signin">
            <form action="/login" method="post">
              @csrf

              <img class="tengah mb-2" src="img/akatara.jpg" alt="" width="170" height="170">
              <h3 class="h3 mb-3 fw-normal text-center">Login</h3>

          
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                id="email" placeholder="name@example.com" autofocus required value="{{ old ('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>   
                @enderror
              </div>

              <div class="form-floating">
                <input type="password" name="password" class="form-control" 
                id="password" placeholder="Password" required><label for="password">Password</label>
              </div>
          
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>

            <small class="d-block text-center mt-3">Not Registered? <a href="/register">Click Here</a></small>
            <small class="d-block mt-5 text-muted text-center">&copy; 2021 | Akatara Outdoor</small>
        </main>
    </div>
</div>


@endsection