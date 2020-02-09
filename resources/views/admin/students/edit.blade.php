@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Student Infomation</h1>
  </div>

  <div class="row">
    <div class="col">
      <div class="card display-inline">
        <div class="card-body">
          <form action="/admin/students" method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" value="{{$user->phone}}">
            </div>
            <div class="form-group">
              <label>User Type</label>
              <select class="form-control">
                <option value="0">Student</option>
                <option value="1" @if ($user->is_admin == 1) selected @endif>
                  Adminstrator
                </option>
              </select>
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