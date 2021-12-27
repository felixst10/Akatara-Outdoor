@extends('layouts.main')

@section('container')
<h1> Halaman About </h1>
<img src="img/{{ $image }}" alt="{{ $name }}" width="250" class="img-thumbnail-rounded-circle">
<h3>{{ $name }}</h3>
<p>{{ $email }}</p>
<p>{{ $nomor }}</p>
@endsection
