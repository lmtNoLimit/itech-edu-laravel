@extends('layouts.app')

@section('content')
<div class="container">
  <section id="images-slider">
    <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="3500" data-pause="hover">
      <ol class="carousel-indicators">
        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselIndicators" data-slide-to="1"></li>
        <li data-target="#carouselIndicators" data-slide-to="2"></li>
        <li data-target="#carouselIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('images/banner/banner_main.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('images/banner/banner_khachsan.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('images/banner/banner_ngoaingu.jpg') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('images/banner/banner_oto.jpg') }}" alt="Third slide">
        </div>
      </div>
    </div>
  </section>

  <section id="nganh-dao-tao" class="my-3" style="background: #fff">
    <div class="row no-gutters">
      <div class="col-md-3">
        <div class="card border-0">
          <a class="text-white" href="#">
            <img src="{{ asset('images/cntt.jpg') }}" alt="Công nghệ thông tin" width="100%">
            <div class="card-img-overlay d-flex align-items-end">
              <p class="card-text h5">CÔNG NGHỆ THÔNG TIN</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-6 p-3">
        <h2 class="text-center">Các Ngành Đào Tạo</h2>
        <p class="text-center" style="font-size: 1.3rem">Chương trình đào tạo của viên I-TECH được thiết kế dựa trên sự
          tham vấn của
          chuyên
          gia,chú trọng thực hành
          , phù hợp với nhu cầu mà nhà tuyển dụng tìm kiếm ở nguồn nhân lực thế hệ mới</p>
      </div>
      <div class="col-md-3">
        <div class="card border-0">
          <a class="text-white" href="#">
            <img src="{{ asset('images/an_toan_thong_tin.jpg') }}" alt="An toàn thông tin" width="100%">
            <div class="card-img-overlay d-flex align-items-end">
              <p class="card-text h5">AN TOÀN THÔNG TIN</p>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-3">
        <div class="card border-0 mb-3">
          <a class="text-white" href="#">
            <img src="{{ asset('images/lap_trinh_ai.jpg') }}" alt="Du lịch khách sạn" width="100%">
            <div class="card-img-overlay d-flex align-items-end">
              <p class="card-text h5">LẬP TRÌNH AI</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0">
          <a class="text-white" href="#">
            <img src="{{ asset('images/du_lich_khach_san.jpg') }}" alt="Du lịch khách sạn" width="100%">
            <div class="card-img-overlay d-flex align-items-end">
              <p class="card-text h5">DU LỊCH KHÁCH SẠN</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0">
          <a class="text-white" href="#">
            <img src="{{ asset('images/ngon_ngu.jpg') }}" alt="Ngôn ngữ" width="100%">
            <div class="card-img-overlay d-flex align-items-end">
              <p class="card-text h5">NGÔN NGỮ</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0">
          <a class="text-white" href="#">
            <img src="{{ asset('images/cong_nghe_oto.jpg') }}" alt="Công nghệ ô tô" width="100%">
            <div class="card-img-overlay d-flex align-items-end">
              <p class="card-text h5">CÔNG NGHỆ Ô TÔ</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="" class="mb-3">
    <div class="row">
      <div class="col-12">
        <img src="{{ asset('images/theo_hoc_tai_itech.jpg')}}" alt="Theo hoc tai itech" width="100%">
      </div>
    </div>
  </section>

  <section id="tuyen-sinh" class="bg-light">
    <div class="row" style="padding: 0 1rem;">
      <div class="col-lg-6 col-md-12 my-3">
        <h2>TUYỂN SINH</h2>
        <div class="card border-0 mb-3">
          <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap" height="300">
          <div class="card-body bg-light px-0">
            <h5 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nesciunt impedit!
              Voluptatibus.</h5>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi delectus molestiae
              necessitatibus ex ducimus pariatur esse cumque optio, officiis, minus quas, cupiditate possimus quis
              accusantium laboriosam! Quas impedit ipsam rem..</p>
          </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
          <a href="#" class="btn btn-outline-warning">XEM TẤT CẢ</a>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 my-3">
        <h2>CÂU HỎI</h2>
        <div style="max-height: 500px; overflow: auto">
          <ul class="list-group">
            <li class="list-group-item">1. Điều kiện tuyển sinh của Viện Đào tạo CNTT Quốc tế I-Tech là gì?</li>
            <li class="list-group-item">2. Trình độ Tiếng Anh chưa tốt có đủ điều kiện học tại Viện Đào tạo CNTT Quốc
              tế
              I-Tech không?</li>
            <li class="list-group-item">3. Khi đã có người thân học tại Viện Đào tạo CNTT Quốc tế I-Tech thì khi nhập
              học
              có được giảm học phí không?</li>
            <li class="list-group-item">4. Trong chương trình học có kỳ thực tập doanh nghiệp không? Em sẽ được tự chọn
              chỗ thực tập không hay nhà
              trường sắp xếp? Và thực tập có lương hay không?</li>
            <li class="list-group-item"> 5. Tại Viện Đào tạo CNTT Quốc tế I-Tech, mỗi lớp có bao nhiêu sinh viên?</li>
            <li class="list-group-item"> 6. Ngành Quản trị và bảo mật hệ thống mạng sinh viên học tại Viện Đào tạo CNTT
              Quốc tế I-Tech có điểm gì nổi
              bật so với những Trường khác?</li>
            <li class="list-group-item"> 7. Học lập trình tại Viện Đào tạo CNTT Quốc tế I-Tech ra trường làm những công
              việc gì?</li>
            <li class="list-group-item"> 8. Giữa Phần mềm và An toàn thông tin, ngành nào khó học hơn, ngành nào dễ kiếm
              việc hơn?</li>
            <li class="list-group-item"> 9. Ngành Thiết kế đồ họa sinh viên học tại Viện Đào tạo CNTT Quốc tế I-Tech có
              nơi để thực tập không?</li>
            <li class="list-group-item">10. Sinh viên học tại Viện Đào tạo CNTT Quốc tế I-Tech có thể đi du học ở nước
              ngoài được không?</li>
          </ul>
        </div>
        <div class="d-flex justify-content-center mt-3">
          <a href="#" class="btn btn-outline-success">XEM TẤT CẢ</a>
        </div>
      </div>
    </div>
  </section>

  <section id="features" class="mt-3">
    <div class="row px-3">
      <div class="col-lg p-3 bg-light">
        <a href="#" class="feature-item">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <i class="fas fa-toilet-paper fa-3x my-2"></i>
            <p class="text-center">BÀI TEST CHỌN NGÀNH NGHỀ</p>
          </div>
        </a>
      </div>
      <div class="col-lg p-3 bg-success">
        <a href="" class="feature-item">
          <div class="d-flex justify-content-center align-items-center flex-column text-white">
            <i class="fas fa-pencil-alt fa-3x  my-2"></i>
            <p class="text-center">ĐĂNG KÝ TƯ VẤN</p>
          </div>
        </a>
      </div>
      <div class="col-lg p-3 bg-light">
        <a href="#" class="feature-item">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <i class="fas fa-search fa-3x my-2"></i>
            <p class="text-center">TRA CỨU</p>
          </div>
        </a>
      </div>
      <div class="col-lg p-3 bg-success">
        <a href="#" class="feature-item">
          <div class="d-flex justify-content-center align-items-center flex-column text-white">
            <i class="fas fa-gift fa-3x my-2"></i>
            <p class="text-center">HỌC BỔNG</p>
          </div>
        </a>
      </div>
      <div class="col-lg p-3 bg-light">
        <a href="#" class="feature-item">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <i class="fas fa-tv fa-3x my-2"></i>
            <p class="text-center">ĐĂNG KÝ DỰ TUYỂN ONLINE</p>
          </div>
        </a>
      </div>

    </div>
  </section>

  <section id="facebook">
			<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=297302807515934&autoLogAppEvents=1';
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			<div class="container">
				<div class="fb-comments" data-href="http://i-tech.edu.vn/" data-numposts="5" data-width="100%" data-order-by="reverse_time"></div>
			</div>
		</section>
</div>
@endsection