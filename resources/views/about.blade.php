@extends('layouts.main')

@section('container')
<h1> Halaman About </h1>
<img src="img/{{ $image }}" alt="{{ $name }}" width="250" class="img-thumbnail-rounded-circle">
<h3>{{ $name }}</h3>
<p>{{ $email }}</p>
<p>{{ $nomor }}</p>
<small class="d-block mt-5 text-muted text-center">&copy; 2021 | Akatara Outdoor</small>
@endsection


