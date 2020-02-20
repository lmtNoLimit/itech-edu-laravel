@extends('layouts.app')

@section('content')
<div class="container bg-light">
  @include('client.landing.partials.banner')
  @include('client.landing.partials.sales')
  @include('client.landing.partials.received')
  @include('client.landing.partials.courseContent')
  @include('client.landing.partials.mentor')
  @include('client.landing.partials.benefit')
  @include('client.landing.partials.feedback')
  @include('client.landing.partials.slider')
  @include('client.landing.partials.register')
</div>

@endsection