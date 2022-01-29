@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Account</h1>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>
          {{-- <a href="/admin/users/{{ $user->id }}" class="badge bg-info">
          <span data-feather="eye"></span></a> --}}
          <a href="/admin/users/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/admin/users/{{ $user->id }}" method="post" class="d-inline">
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