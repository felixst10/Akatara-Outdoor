@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $beranda->title}}</h2>
            
            <p> Kategori | <a href="/?category={{ $beranda->category->slug }}" class="text-decoration-none">
                {{ $beranda->category->name }}</a></p>
                
                <img src="https://source.unsplash.com/700x300?{{ $beranda->category->name }}"
                alt="{{ $beranda->category->name }}" class="img-fluid">

    <div class="my-3 fs-6">
        {{$beranda->body}}
    </div>
                <p><a href="/" class="text-decoration-none">back to home</a></p>
        </div>
    </div>
</div>
    
@endsection