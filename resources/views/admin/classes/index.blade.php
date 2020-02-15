@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quản lý lớp</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/classes/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Thêm lớp</span>
    </a>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Mã Lớp</th>
          <th scope="col">Tên lớp</th>
          <th scope="col">Năm</th>
          <th scope="col">Mã ngành</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($classes as $class)
        <tr>
          <th scope="row">{{$class->class_id}}</th>
          <td>{{$class->name}}</td>
          <td>{{$class->year}}</td>
          <td>{{$class->majors_id}}</td>
          <td>
            <form class="form-inline" action="/admin/classes/{{$class->class_id}}" method="POST">
              <a href="/admin/classes/{{$class->class_id}}" class="btn btn-sm btn-info mr-1">Danh sách sinh viên</a>
              <a href="/admin/classes/{{$class->class_id}}/addStudent" class="btn btn-sm btn-info mr-1">Thêm sinh
                viên</a>
              <a href="/admin/classes/{{$class->class_id}}/edit" class="btn btn-sm btn-info mr-1">Edit</a>
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