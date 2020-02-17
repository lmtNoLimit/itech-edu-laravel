@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Quản lý học viên</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/students/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Thêm học viên</span>
    </a>
    <a class="btn btn-sm btn-warning ml-2" href={{ route('export') }}>Xuất excel</a>
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
            <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="/admin/students/{{$user->id}}/edit"
              class="text-info">
              <i class="fas fa-edit"></i>
            </a>
            <a data-toggle="tooltip" data-placement="bottom" title="Delete" href="#" class="text-danger">
              <i data-toggle="modal" data-target="#deleteModal{{$user->id}}" class="fas fa-trash-alt"></i>
            </a>
          </td>
        </tr>
        <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-footer">
                <form id="delete-form" class="form-inline" action="/admin/students/{{$user->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                  <button id="btnDelete" class="btn btn-danger" type="submit">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection