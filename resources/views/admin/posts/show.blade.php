@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $beranda->title}}</h2>
            <a href="/admin/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Post</a>
            <a href="/admin/posts/{{ $beranda->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/admin/posts/ {{ $beranda->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><span data-feather="x-circle"></span>Delete</button>
            </form>
             
            @if ($beranda->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/'. $beranda->image) }}"
                    alt="{{ $beranda->category->name }}" class="img-fluid mt-4">
                </div> 
            @else
                <img src="https://source.unsplash.com/700x300?{{ $beranda->category->name }}"
                alt="{{ $beranda->category->name }}" class="img-fluid mt-4">   
            @endif
                

    <div class="my-3 fs-6">
        {!! $beranda->body !!}
    </div>
        </div>
    </div>
</div>
    
@endsection