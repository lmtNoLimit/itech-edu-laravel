@if(Session::has('success'))
<div class="toast">
  <div class="toast-body">
    {{Session::get('success')}}
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif

@if(Session::has('error'))
<div class="toast" style="position: absolute; top: 0; right: 0;">
  <div class="toast-body">
    {{Session::get('error')}}
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif