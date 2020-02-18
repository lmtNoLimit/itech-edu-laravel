@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách sinh viên</h1>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Mã sinh viên</th>
          <th scope="col">Tên sinh viên</th>
          <th scope="col">Giới tính</th>
          <th scope="col">Ngày sinh</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <th scope="row">{{$student->student_id}}</th>
          <td>{{$student->name}}</td>
          <td>{{$student->gender == 1 ? "Nữ" : "Nam"}}</td>
          <td>{{$student->birthday}}</td>
          <td>{{$student->address}}</td>
          <td>{{$student->phone}}</td>
          <td>
            <button data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-success">
              <i class="fas fa-plus" data-toggle="tooltip" data-placement="bottom" title="Thêm"></i>
            </button>
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                      <span>Bạn có chắc chắn muốn thêm <strong>{{$student->name}}</strong> vào lớp
                        <strong>{{$class->class_id}}</strong>?
                      </span>
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-footer border-0">
                    <form class="form-inline" action="/admin/classes/{{$class->class_id}}" method="POST">
                      @csrf
                      <input type="hidden" name="class_id" value={{$class->class_id}}>
                      <input type="hidden" name="student_id" value={{$student->student_id}}>
                      <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                        Huỷ
                      </button>
                      <button type="submit" class="btn btn-success btn-sm ml-2">Thêm</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end" style="width: 100%">
      {{ $students->links() }}
    </div>
  </div>
</div>

@endsection