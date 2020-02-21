@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$course->name}}</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalAddSection">
      <i class="fas fa-plus"></i>
      <span>Thêm danh mục</span>
    </button>
  </div>

  <div class="modal fade" id="modalAddSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form" action="/admin/courses/{{$course->course_id}}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value={{ $course->course_id }}>
            <div class="form-group">
              <label for="section_name" class="col-form-label">Tên danh mục:</label>
              <input type="text" class="form-control" id="section_name" name="section_name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Huỷ</button>
          <button id="btnSubmit" type="submit" class="btn btn-sm btn-success">Thêm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Tên danh mục</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sections as $section)
        <tr>
          <td>{{$section->name}}</td>
          <td>
            <button data-toggle="modal" data-target="#deleteModal{{$section->id}}"
              class="btn btn-sm btn-danger">Xoá</button>
            <div class="modal fade" id="deleteModal{{$section->id}}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-footer border-0">
                    <form id="form" class="form-inline"
                      action="/admin/courses/{{$course->course_id}}/sections/{{$section->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" aria-label="Close">
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