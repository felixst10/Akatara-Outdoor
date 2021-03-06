@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Posts</h1>
</div>

@if (session()->has ('success'))
  <div class="alert alert-success col-lg-9" role="alert">
    {{ session('success') }}
  </div>  
@endif


<div class="table-responsive col-lg-9">
  <a href="/admin/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $beranda)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $beranda->title }}</td>
        <td>{{ $beranda->category->name }}</td>
        <td>
          <a href="/admin/posts/{{ $beranda->id }}" class="badge bg-info">
          <span data-feather="eye"></span></a>
          <a href="/admin/posts/{{ $beranda->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/admin/posts/{{ $beranda->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    
@endsection