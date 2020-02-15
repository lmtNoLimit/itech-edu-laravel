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
              <label class="col-sm-2 col-form-label" for="slug">Mã lớp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                  value="{{ old('slug') }}">
                @error('slug')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="name">Tên lớp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="year">Năm học</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                  value="{{ old('year') }}">
                @error('year')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="course_id">Mã ngành</label>
              <div class="col-sm-10">
                
              <select class="form-control" id="name" name="course_id">
                @foreach ($courses as $course)
                  <option value="{{$course->course_id}}">{{$course->course_id.' - '.$course->name}}</option>  
                @endforeach
                </select>

                @error('course_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group text-center">
              <a href="/admin/classes" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection