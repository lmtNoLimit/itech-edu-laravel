@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin lớp</h1>
  </div>
  <div class="row">
    <div class="col">
      <div class="card display-inline">
        <div class="card-body">
          <form action="/admin/students" method="POST">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="name">Tên lớp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="{{$class->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="year">Năm</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="year" value="{{$class->year}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="course_id">Mã ngành</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="course_id" value="{{$class->course_id}}">
              </div>
            </div>
            <div class="form-group text-center">
              <a href="/admin/classes" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
          </form>
          </div>
        </div>
      </div>   
    </div>   
</div>
@endsection