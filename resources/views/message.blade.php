{{-- @if($message = Session::get('success'))
<div class="toast">
  <div class="toast-body">
    {{$message}}
<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
</div>
@endif

@if($message = Session::get('error'))
<div class="toast" style="position: absolute; top: 0; right: 0;">
  <div class="toast-body">
    {{$message}}
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif --}}

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed" style="top: 30px; right: 20px;"
  role="alert">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show position-fixed" style="top: 20px; right: 20px;" role="alert">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif