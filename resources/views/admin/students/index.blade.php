@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Quản lý học viên</h1>
  </div>
  <div class="row m-2 d-flex justify-content-between">
    <div>
      <form class="form-inline" action="/admin/students" method="GET">
        <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" id="inlineFormInputName2"
          placeholder="Search..." name="q" value={{isset($q) ? $q : ''}}>
        <button type="submit" class="btn btn-sm btn-primary mb-2">search</button>
      </form>
    </div>
    <div>
      <a href="/admin/students/create" class="btn btn-sm btn-success">
        <i class="fas fa-plus"></i>
        <span>Thêm học viên</span>
      </a>
      <a class="btn btn-sm btn-warning ml-2" href={{ route('export') }}>Xuất excel</a>
    </div>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="text-center">Mã sinh viên</th>
          <th scope="col" class="text-center">Họ và tên</th>
          <th scope="col" class="text-center">Tên tài khoản</th>
          <th scope="col" class="text-center">Ngày sinh</th>
          <th scope="col" class="text-center">Giới tính</th>
          <th scope="col" class="text-center">Địa chỉ</th>
          <th scope="col" class="text-center">Email</th>
          <th scope="col" class="text-center">Phone</th>
          <th scope="col" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th>{{$user->student_id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->username}}</td>
          <td>{{$user->birthday}}</td>
          <td>{{$user->gender == 1 ? "Nữ" : "Nam"}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>
            <div class="d-flex">
              <a data-toggle="tooltip" data-placement="bottom" title="Sửa"
                href="/admin/students/{{$user->student_id}}/edit" class="btn btn-sm btn-info mr-1">
                <i class="far fa-edit"></i>
              </a>
              <button data-toggle="tooltip" data-placement="bottom" title="Xoá" class="btn btn-sm btn-danger">
                <i data-toggle="modal" data-target="#deleteModal{{$user->student_id}}" class="fas fa-trash-alt"></i>
              </button>
            </div>
          </td>
        </tr>
        <div class="modal fade" id="deleteModal{{$user->student_id}}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">
                  Bạn có chắc chắn muốn xoá <strong>{{$user->name}}</strong>?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-footer border-0">
                <form id="form" class="form-inline" action="/admin/students/{{$user->student_id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-secondary mr-2" data-dismiss="modal">Huỷ</button>
                  <button id="btnSubmit" class="btn btn-sm btn-danger" type="submit">Xoá</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end" style="width: 100%">
      {{ $users->links() }}
    </div>
  </div>
</div>

@endsection