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
          <form action="/admin/news" method="POST">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="title">Tiêu đề</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                  value="{{ old('title') }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="content"> Nội dung</label>
              <div class="col-sm-10">
                <textarea class="form-control " id="txtContent" name="content" rows="10"></textarea>
              </div>
              @error('content')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="name">Thể loại</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                  value="{{ old('type') }}">
                @error('type')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Đăng bài</button>
              <a href="/admin/students" class="btn btn-secondary">Cancel</a>
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
    height: 1500,
    filebrowserBrowseUrl: "{{asset('js/plugins/ckfinder/ckfinder.html')}}",
    filebrowserUploadUrl: "{{asset('js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Files')}}"});
    
</script>

@endsection