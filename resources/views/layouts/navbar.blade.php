@php
$courses = [
'ccna' => "Giải pháp hạ tầng mạng trong doanh nghiệp (CCNA)",
'mcsa' => "Giải pháp dịch vụ mạng trong doanh nghiệp (MCSA)",
'linux' => "Quản trị server Linux",
'ceh' => "Hacker mũ trắng (CEH)",
'chfi' => "Chuyên gia điều tra tội phạm mạng (CHFI)",
'php' => "Lập trình PHP",
'android' => "Lập trình Android",
'graphic' => "Thiết kế đồ hoạ",
];

$admission = [
'tin_tuyen_sinh' => 'Tuyển sinh năm 2020',
'quy_che_tuyen_sinh' => 'Quy chế tuyển sinh',
'hoc_phi_hoc_bong' => 'Học phí - Học bổng',
'hoi_dap' => 'Hỏi đáp'
];

$news = [
'tin_noi_bo' => "Tin nội bộ",
'tin_cong_nghe' => "Tin công nghệ",
'events' => "Sự kiện"
];

$students = [
'thoi_khoa_bieu' => "Thời khoá biểu",
'ket_qua_hoc_tap' => "Kết quả học tập",
'mau_van_ban' => "Mẫu văn bản"
]
@endphp

<nav id="navbar" class="navbar navbar-expand-md bg-green">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link px-3" href="{{ route('home') }}">
            <i class="fas fa-home fa-lg"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="{{ route('about') }}">GIỚI THIỆU</a>
        </li>
        <li class="nav-item dropdown">
          <span class="nav-link px-3 dropdown-toggle">NGÀNH ĐÀO TẠO</span>
          <ul class="dropdown-menu animated fadeIn faster" style="width: 200px">
            <li class="nav-item">
              <span class="nav-link text-dark">
                Cao đẳng chất lượng cao
              </span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="nav-item dropdown-submenu">
              <span class="nav-link text-dark">Các khoá học ngắn hạn</span>
              <ul class="dropdown-menu animated fadeInLeft faster" style="width: 400px">
                @foreach($courses as $key => $value)
                <li class="nav-item">
                  <a class="nav-link text-dark" href="/nganh-dao-tao/{{$key}}">
                    {{ $value }}
                  </a>
                </li>
                <li class="dropdown-divider"></li>
                @endforeach
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <span class="nav-link px-3 dropdown-toggle">TUYỂN SINH</span>
          <ul class="dropdown-menu animated fadeIn faster" style="width: 170px">
            @foreach($admission as $key => $value)
            <li class="nav-item">
              <a href="{{ route($key) }}" class="nav-link text-dark">
                {{$value}}
              </a>
            </li>
            <li class="dropdown-divider"></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item dropdown">
          <span class="nav-link px-3 dropdown-toggle">TIN TỨC</span>
          <ul class="dropdown-menu animated fadeIn faster" style="width: 120px">
            @foreach($news as $key => $value)
            <li class="nav-item">
              <a href="{{ route($key) }}" class="nav-link text-dark">
                {{ $value }}
              </a>
            </li>
            <li class="dropdown-divider"></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="{{ route('hoi_nhap_quoc_te') }}">
            HỘI NHẬP QUỐC TẾ
          </a>
        </li>
        <li class="nav-item dropdown">
          <span class="nav-link px-3 dropdown-toggle">SINH VIÊN</span>
          <ul class="dropdown-menu animated fadeIn faster" style="width: 130px">
            @foreach($students as $key => $value)
            <li class="nav-item">
              <a href="{{ route($key) }}" class="nav-link text-dark">
                {{ $value }}
              </a>
            </li>
            <li class="dropdown-divider"></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="{{ route('contact') }}">LIÊN HỆ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>