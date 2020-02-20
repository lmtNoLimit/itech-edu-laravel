@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm tin</h1>
  </div>

  <div class="row">
    <div class="col">
      <div class="card display-inline">
        <div class="card-body">
          <form id="form" action="/admin/results" method="POST">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="class_id">Lớp</label>
              <div class="col-sm-10">
                <select class="form-control" name="class_id" id="class_id">
                  @foreach ($classes as $class)
                  <option value="{{$class->class_id}}">
                    {{ $class->class_id}} - {{$class->name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="description">Môn học</label>
              <div class="col-sm-10">
                <select class="form-control" name="subject_id" id="subject_id">
                  @foreach ($subjects as $subject)
                  <option value="{{ $subject->subject_id }}">
                    {{ $subject->subject_id}} - {{ $subject->name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="content">Nội dung</label>
              <div class="col-sm-10">
                <textarea class="form-control @error('content') is-invalid @enderror" id="txtContent" name="content"
                  rows="10"></textarea>
              </div>
              @error('content')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group text-center">
              <button id="btnSubmit" type="submit" class="btn btn-primary">
                Cập nhật điểm
              </button>
              <a href="/admin/results" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('js/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/plugins/ckfinder/ckfinder.js')}}"></script>
<script>
  CKEDITOR.replace('txtContent', {
    height: 500,
    filebrowserBrowseUrl: "{{asset('js/plugins/ckfinder/ckfinder.html')}}",
    filebrowserUploadUrl: "{{asset('js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Files')}}"});
</script>

@endsection