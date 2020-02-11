@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm lớp</h1>
  </div>

  <div class="row">
    <div class="col">
      <div class="card display-inline">
        <div class="card-body">
          <form action="/admin/classes" method="POST">
              @csrf
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">Tên lớp</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">Năm học</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                    value="{{ old('year') }}">
                </div>
                @error('year')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="course_id">Mã khoa</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('birthday') is-invalid @enderror" id="course_id"
                  name="course_id" value="{{old('course_id') }}">
              </div>
              @error('course_id')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group text-center">
              <a href="/admin/students" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>    
        </div>
      </div>  
    </div>
  </div>
</div>
@endsection