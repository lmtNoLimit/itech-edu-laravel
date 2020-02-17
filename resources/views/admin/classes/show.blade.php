@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
      Danh sách sinh viên lớp <strong>{{$class->name}}</strong>
    </h1>
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
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <th scope="row">{{$student->student_id}}</th>
          <td>{{$student->name}}</td>
          <td>{{$student->gender == 1 ? "Nữ" : "Nam"}}</td>
          <td>{{$student->birthday}}</td>
          <td>{{$student->address}}</td>
          <td>{{$student->phone}}</td>
          <td>
            <form class="form-inline" action="/admin/classes/{{$class->class_id}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection