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
          <form id="form" action="/admin/classes/{{$class->class_id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="class_id">Mã lớp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="class_id" value="{{ $class->class_id }}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="majors_id">Mã ngành</label>
              <div class="col-sm-10">
                <select class="form-control" id="name" name="majors_id">
                  @foreach ($majors as $majorsItem)
                  <option value="{{$majorsItem->majors_id}}" @if($class->majors_id == $majorsItem->majors_id) selected
                    @endif>
                    {{$majorsItem->majors_id.' - '.$majorsItem->name}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="name">Tên lớp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                  value="{{old('name', $class->name)}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="year">Năm</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="year" id="year" value="{{old('year', $class->year)}}">
                @error('year')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group text-center">
              <a href="/admin/classes" class="btn btn-secondary">Cancel</a>
              <button id="btnSubmit" type="submit" class="btn btn-success">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection