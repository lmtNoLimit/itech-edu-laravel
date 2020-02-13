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
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div id="app">
    <header id="header" class="navbar navbar-expand-md navbar-dark shadow-sm">
      <div class="container">
        <div class="d-flex">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ asset('images/logo.png') }}" alt="logo">
          </a>
          <form class="form-inline mx-4 navbar__form-search">
            <input class="form-control" type="search" placeholder="Tìm kiếm thông tin..." aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0 navbar__form-search__button" type="submit">
              <i class="fas fa-search"></i>

            </button>
          </form>
        </div>
        <button class="navbar-toggler border-0 text-white" type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        {{--
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right animated faster slideInDown" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Đăng xuất') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
        </ul>
      </div> --}}
  </div>
  </header>

  <nav id="navbar" class="navbar navbar-expand-md">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link px-3" href="#">
              <i class="fas fa-home fa-lg"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">GIỚI THIỆU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3 dropdown-toggle" data-toggle="dropdown" href="#">
              <span>NGÀNH ĐÀO TẠO</span>
            </a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a class="nav-link text-dark" href=" #">Cao đẳng chất lượng cao</a></li>
              <li class="dropdown-divider"></li>
              <li class="nav-item dropdown-submenu">
                <a href="#" class="nav-link text-dark">Các khoá học ngắn hạn</a>
                <ul class="dropdown-menu" style="width: 400px">
                  <li class="nav-item"><a class="nav-link text-dark href=" #">Giải pháp hạ tầng mạng trong doanh
                      nghiệp
                      (CCNA)</a></li>
                  <li class="dropdown-divider"></li>

                  <a class="nav-link text-dark href=" #">
                    <li class="nav-item">
                      Giải pháp dịch vụ mạng trong doanh
                      nghiệp
                      (MSNA)
                    </li>
                  </a>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item"><a class="nav-link text-dark href=" #">Quản trị server Linux</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item"><a class="nav-link text-dark href=" #">Hacker mũ trắng (CEH)</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item"><a class="nav-link text-dark href=" #">Chuyên gia điều tra tội phạm mạng
                      (CHFI)</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item"><a class="nav-link text-dark href=" #">Lập trình PHP</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item"><a class="nav-link text-dark href=" #">Lập trình Android</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item"><a class="nav-link text-dark href=" #">Thiết kế đồ hoạ</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">TUYỂN SINH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">TIN TỨC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">HỘI NHẬP QUỐC TẾ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">SINH VIÊN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="#">LIÊN HỆ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="main py-4">
    @yield('content')
  </main>

  <footer id="footer" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 d-flex justify-content-center">
          <div class="d-flex flex-column justify-content-between">
            <p class="h3 text-white">VIỆN ĐÀO TẠO CNTT QUỐC TẾ I-TECH</p>
            <p class="text-white">Địa chỉ: P301, Nhà C, 290 Tây Sơn - Đống Đa - Hà Nội</p>
            <p class="text-white">Hotline: 09666.222.76 - 024.666.222.76</p>
            <p class="text-white">E-mail: info@i-tech.edu.vn</p>
            <p class="text-white">Website: www.i-tech.edu.vn</p>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 d-flex justify-content-center">
          <img src="{{ asset('images/ban_do_itech.jpg')}}" alt="ban_do" style="width: 90%">
        </div>
      </div>
    </div>
  </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>