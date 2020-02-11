@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @include('admin.message')
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Quản lý học viên</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/students/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Thêm học viên</span>
    </a>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Họ và tên</th>
          <th scope="col">Tên tài khoản</th>
          <th scope="col">Ngày sinh</th>
          <th scope="col">Giới tính</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->username}}</td>
          <td>{{$user->birthday}}</td>
          <td>{{$user->gender == 1 ? "Nữ" : "Nam"}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>
            <form class="form-inline" action="/admin/students/{{$user->id}}" method="POST">
              <a href="/admin/students/{{$user->id}}/edit" class="btn btn-sm btn-info mr-1">Edit</a>
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