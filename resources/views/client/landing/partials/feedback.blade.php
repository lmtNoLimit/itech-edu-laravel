@if(request()->is('*/ccna'))
<div class="container bg-light">
  <div class="row">
    <div class="col-sm">
        <div class="text-center">
            <img src="{{ asset('images/feedback/dtc.png') }}" alt="">
            <h2>Đặng Tuấn Cường</h2>
            <h3>(Học viên K7)</h3>
            <p class="text-justify">Được học CCNA là một điều đúng đắn nhất trong cuộc đời và chọn học ở ITech cũng vậy. Với các cô thân thiện chúng tôi đã có những năm học tốt đẹp . Và thành công đến các bạn</p>
        </div>
    </div>
    <div class="col-sm">
        <div class="text-center">
            <img src="{{ asset('images/feedback/ptl.png') }}" alt="">
            <h2>Phạm Thị Linh</h2>
            <h3>(Học viên K6)</h3>
            <p class="text-justify">Tôi đã có một thời gian học tập tại I-Tech. Tôi đã thành công và thảo mãn ước mơ của mình . Cảm ơn các thầy cô rất nhiều, cảm giác học viên I-Tech</p>
        </div>
    </div>
    <div class="col-sm">
        <div class="text-center">
            <img src="{{ asset('images/feedback/nvl.png') }}" alt="">
            <h2>Nguyễn Văn Lực</h2>
            <h3>(Học viên K9)</h3>
            <p class="text-justify">Đến với I-Tech. Tôi đã được luyện tập một cách chuyên nghiệp bám sát vào thực tế công việc. Mọi thứ ở I-Tech đều khiến tôi hài lòng và yên tâm học tập</p>
        </div>
    </div>
  </div>
</div>
@endif

@if(request()->is('*/mcsa'))
<div class="container bg-light">
  <div class="row">
    <div class="col-sm">
        <div class="text-center">
            <img src="{{ asset('images/feedback/tha.png') }}" alt="">
            <h2>Trình Hoài Anh</h2>
            <h3>(Học viên K8)</h3>
            <p class="text-justify">Tham gia khóa học MCSA của I-Tech là một trải nhiệm tuyệt vời đối với tôi, ở  I-Tech tôi được các thầy cô hỗ trợ rất nhiệt tình. Hiện tôi đã có 1 công việc ổn định .Cảm ơn I-Tech rất nhiều !</p>
        </div>
    </div>
    <div class="col-sm">
        <div class="text-center">
            <img src="{{ asset('images/feedback/ntm.png') }}" alt="">
            <h2>Nguyễn Tuấn Mạnh</h2>
            <h3>(Học viên K8)</h3>
            <p class="text-justify">Các thầy cô I-Tech đã giúp tôi vượt qua trở ngại đó để trở thành một quản trị viên chính cho VN Media, sẽ quay lại và tham gia vài khóa khác nữa! </p>
        </div>
    </div>
    <div class="col-sm">
        <div class="text-center">
            <img src="{{ asset('images/feedback/tdk.png') }}" alt="">
            <h2>Trần Đức Kiên</h2>
            <h3>(Tập đoàn Samsung)</h3>
            <p class="text-justify">Ở I-Tech tôi đã được đào tạo kỹ năng được quan tâm hỗ trợ nhiệt tình , đó là một điểm cộng rất lớn khác với các trung tâm khi học xong nhà trường và học viên không có mối liên hệ này nữa, nhưng I-Tech thì không như vậy luôn đồng hành cũng Itech !</p>
        </div>
    </div>
  </div>
</div>
@endif

@if(request()->is('*/linux'))
<h1>Feedback LINUX</h1>
@endif

@if(request()->is('*/ceh'))
<h1>Feedback CEH</h1>
@endif

@if(request()->is('*/chfi'))
<h1>Feedback CHFI</h1>
@endif

@if(request()->is('*/php'))
<h1>Feedback PHP</h1>
@endif

@if(request()->is('*/android'))
<h1>Feedback ANDROID</h1>
@endif

@if(request()->is('*/graphic'))
<h1>Feedback GRAPHIC</h1>
@endif