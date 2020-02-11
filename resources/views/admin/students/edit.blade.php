@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin học viên</h1>
  </div>

  <div class="row">
    <div class="col">
      <div class="card display-inline">
        <div class="card-body">
          <form action="/admin/students" method="POST">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="name">Họ và tên</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="{{$user->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="username">Tên tài khoản</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="username" value="{{$user->username}}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="birthday">Ngày sinh</label>
              <div class="col-sm-10">
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                  name="birthday" value="{{$user->birthday }}">
              </div>
              @error('birthday')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Giới tính</label>
              <div class="col-sm-10">
                <select class="form-control" name="gender" id="gender">
                  <option value="male" @if($user->gender == 'male') checked @endif>Nam</option>
                  <option value="femail" @if($user->gender == 'female') checked @endif>Nữ</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="email">Địa chỉ email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" value="{{$user->email}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="phone">Điện thoại</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" value="{{$user->phone}}">
              </div>
            </div>

            <div class="form-group text-center">
              <a href="/admin/students" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection