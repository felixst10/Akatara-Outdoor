@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $beranda->title}}</h2>
            
            <p> Kategori | <a href="/?category={{ $beranda->category->slug }}" class="text-decoration-none">
                {{ $beranda->category->name }}</a></p>
                
                @if ($beranda->image)
                <div style="max-height: 500px; overflow:hidden">
                    <img src="{{ asset('storage/'. $beranda->image) }}"
                    alt="{{ $beranda->category->name }}" class="img-fluid">
                </div> 
                @else
                    <img src="https://source.unsplash.com/700x300?{{ $beranda->category->name }}"
                    alt="{{ $beranda->category->name }}" class="img-fluid">   
                @endif
                
    <div class="my-3 fs-6">
        {!! $beranda->body !!}
    </div>
                <a href="/" class="bi bi-arrow-left btn btn-primary"> Back to Home</a>
                
                @auth
                <a href="" class="bi bi-basket btn btn-success"> Pesan</a>
                @endauth
        </div>
    </div>
</div>
    
@endsection