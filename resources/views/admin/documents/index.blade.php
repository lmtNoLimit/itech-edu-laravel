@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Quản lý mẫu tin</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/documents/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Thêm văn bản</span>
    </a>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên mẫu tin</th> 
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>

@endsection