@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Students Management</h1>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->is_admin ? 'Admin' : 'Student'}}</td>
          @if (Auth::user()->id != $user->id)
          <td>
            <form class="form-inline" action="/admin/students/{{$user->id}}" method="POST">
              <a href="/admin/students/{{$user->id}}/edit" class="btn btn-sm btn-info mr-1">Edit</a>
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
          @else
          <td></td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection