@extends('layouts.app')

@section('content')
<div class="container">
	@include('message')
	<form action="/test" method="POST" role="form">
		@csrf
		<legend>Form title</legend>
	
		<div class="form-group">
			<label for="">Họ tên</label>
			<input type="text" class="form-control"  name="name" id="name" placeholder="Nhập đủ vào dmm">
			<label for="">Số điện thoại</label>
			<input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập đủ vào dmm">

			<label for="">Email</label>
			<input type="Email" class="form-control" name="email" id="email" placeholder="Nhập đủ vào dmm">

			<label for="">Kiểu khóa học</label>
			<input type="text" class="form-control" name="type_of_education" id="type_of_education" placeholder="Nhập đủ vào dmm">

			<label for="">Ngành</label>
			<input type="text" class="form-control" name="majors_id" id="majors" placeholder="Nhập đủ vào dmm">
			
		</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection