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
          <td>
            <a href="/admin/classes/{{$class->class_id}}" class="text-dark">
              {{$class->name}}
            </a>
          </td>
          <td>{{$class->year}}</td>
          <td>{{$class->majors_id}}</td>
          <td>
            <a href="/admin/classes/{{$class->class_id}}/addStudent" class="btn btn-sm btn-success mr-1"
              data-toggle="tooltip" data-placement="bottom" title="Thêm sinh viên">
              <i class="fas fa-plus"></i>
            </a>
            <a href="/admin/classes/{{$class->class_id}}/edit" class="btn btn-sm btn-info mr-1" data-toggle="tooltip"
              data-placement="bottom" title="Sửa">
              <i class="far fa-edit"></i>
            </a>
            @method('DELETE')
            @csrf
            <button data-toggle="modal" data-target="#deleteModal{{$class->class_id}}" class="btn btn-sm btn-danger">
              <i class="far fa-trash-alt" data-toggle="tooltip" data-placement="bottom" title="Xoá"></i>
            </button>
            <div class="modal fade" id="deleteModal{{$class->class_id}}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                      <span>Bạn có chắc chắn muốn xoá lớp
                        <strong>{{$class->name}}</strong>?
                      </span>
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-footer border-0">
                    <form id="form" class="form-inline" action="/admin/classes/{{$class->class_id}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close">
                        Huỷ
                      </button>
                      <button id="btnSubmit" type="submit" class="btn btn-danger btn-sm ml-2">Xoá</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection