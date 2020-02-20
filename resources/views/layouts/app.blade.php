<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body class="custom-scrollbar">
  <div id="app">
    @include('layouts.header')
    @include('layouts.navbar')

    <main class="main">
      @yield('content')
    </main>

    @include('layouts.footer')
  </div>
  <script src="https://uhchat.net/code.php?f=b90111"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>