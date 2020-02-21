@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Quản lý môn học</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/subjects/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Thêm bài học</span>
    </a>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Mã bài học</th>         
          {{-- <th scope="col">Danh mục</th> --}}
          <th scope="col">Tên môn</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach ($subjects as $subject)
        <tr>
          <td>{{$subject->subject_id}}</td>
          <td>{{$subject->name}}</td>
          <td>
            <a href="/admin/subjects/{{$subject->subject_id}}/edit" class="btn btn-sm btn-info mr-1">Sửa</a>
            <button data-toggle="modal" data-target="#deleteModal{{$subject->subject_id}}"
              class="btn btn-sm btn-danger">Xoá</button>
            <div class="modal fade" id="deleteModal{{$subject->subject_id}}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                      <span>
                        Bạn có chắc chắn muốn xoá môn <strong>{{$subject->subject_id}}</strong>?
                      </span>
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-footer border-0">
                    <form id="form" class="form-inline" action="/admin/subjects/{{$subject->subject_id}}" method="POST"
                      id="delete-form">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-secondary mr-2" type="button" data-dismiss="modal">Huỷ</button>
                      <button id="btnSubmit" class="btn btn-sm btn-danger" type="submit">Xoá</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach --}}
      </tbody>
    </table>
  </div>
</div>

@endsection