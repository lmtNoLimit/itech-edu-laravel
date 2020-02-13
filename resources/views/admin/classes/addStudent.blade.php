@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách sinh viên</h1>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Mã sinh viên</th>
          <th scope="col">Tên sinh viên</th>
          <th scope="col">Giới tính</th>
          <th scope="col">Ngày sinh</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Số điện thoại</th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach ($students as $classID) -->
        <tr>
          <th scope="row">{{$classes->class_id}}</th>
          <td>{{$students->students_id}}</td>
          <td>
            <form class="form-inline" action="/admin/classes/{{$class->id}}" method="POST">
              <a href="/admin/classes/{{$class->id}}/edit" class="btn btn-sm btn-info mr-1">Edit</a>
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              
            </form>
          </td>
        </tr>
        <!-- @endforeach --}}
      </tbody>
    </table>
  </div>
</div>
@endsection