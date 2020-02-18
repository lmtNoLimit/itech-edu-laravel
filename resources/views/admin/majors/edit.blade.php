@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Course Infomation</h1>
  </div>

  <div class="row">
    <div class="col">
      <div class="card display-inline">
        <div class="card-body">
          <form id="form" action="/admin/majors/{{$majors->majors_id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="majors_id">Mã ngành</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="majors_id" id="majors_id" value="{{$majors->majors_id}}"
                  disabled>
                @error('majors_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="name">Tên ngành</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                  value="{{old('name', $majors->name)}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="type_of_education">Loại hình đào tạo</label>
              <div class="col-sm-10">
                <select class="form-control" id="type_of_education" name="type_of_education">
                  <option value="short_term" @if($majors->type_of_education == "short_term") selected @endif>
                    Ngắn hạn
                  </option>
                  <option value="long_term" @if($majors->type_of_education == "long_term") selected @endif>
                    Dài hạn
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group text-center">
              <a href="/admin/majors" class="btn btn-secondary">Cancel</a>
              <button id="btnSubmit" type="submit" class="btn btn-success">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection