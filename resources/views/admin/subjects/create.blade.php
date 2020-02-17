@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm môn học</h1>
  </div>

  <div class="row">
    <div class="col">
      <div class="card display-inline">
        <div class="card-body">
          <form id="form" action="/admin/subjects" method="POST">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="subject_id">Mã môn học</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('subject_id') is-invalid @enderror" id="subject_id"
                  name="subject_id" value="{{ old('subject_id') }}">
                @error('subject_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="name">Tên môn học</label>
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
        </div>
        <div class="form-group text-center">
          <a href="/admin/subjects" class="btn btn-secondary">Cancel</a>
          <button id="btnSubmit" type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection