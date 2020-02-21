@if(request()->is('*/ccna'))
	<img src="{{ asset('images/courses/banner/banner_ccna.jpg') }}" width="100%">
@endif

@if(request()->is('*/mcsa'))
	<img src="{{ asset('images/courses/banner/banner_mcsa.jpg') }}" width="100%">
@endif

@if(request()->is('*/linux'))
	<img src="{{ asset('images/courses/banner/banner_linux.jpg') }}" width="100%">
@endif

@if(request()->is('*/ceh'))
	<img src="{{ asset('images/courses/banner/banner_ceh.jpg') }}" width="100%">
@endif

@if(request()->is('*/chfi'))
	<img src="{{ asset('images/courses/banner/banner_ceh.jpg') }}" width="100%">
@endif

@if(request()->is('*/php'))
<h1>Banner PHP</h1>
@endif

@if(request()->is('*/android'))
<h1>Banner ANDROID</h1>
@endif

@if(request()->is('*/graphic'))
<h1>Banner GRAPHIC</h1>
@endif