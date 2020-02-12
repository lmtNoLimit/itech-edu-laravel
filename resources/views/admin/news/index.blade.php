@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Quản tin tức</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/news/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Thêm tin tức</span>
    </a>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tiêu đề</th>
          <th scope="col">Thể loại</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($news as $new)
        <tr>
          <th scope="row">{{$new->id}}</th>
          <td>{{$new->title}}</td>>
          <td>{{$new->type}}</td>
          <td>
            <a href="/admin/news/{{$new->id}}/edit" class="btn btn-sm btn-info mr-1">Edit</a>
            <button data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer">
        <form class="form-inline" action="/admin/students/{{$new->id ?? ''}}" method="POST" id="delete-form">
          @csrf
          @method('DELETE')
          <button class="btn btn-secondary mr-2" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection