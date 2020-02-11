@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quản lý lớp</h1>
  </div>

  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên lớp</th>
          <th scope="col">Năm</th>
          <th scope="col">Mã khoa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($classes as $class)
        <tr>
          <th scope="row">{{$class->id}}</th>
          <td>{{$class->name}}</td>
          <td>{{$class->course_id}}</td>
          <td>
            <form class="form-inline" action="/admin/classes/{{$class->id}}" method="POST">
              <a href="/admin/classes/{{$class->id}}/edit" class="btn btn-sm btn-info mr-1">Edit</a>
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection