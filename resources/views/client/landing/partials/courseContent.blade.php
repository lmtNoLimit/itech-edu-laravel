<section id="course-content">
  <h2 class="bg-green text-light text-center py-2 text-uppercase">Nội dung khoá học</h2>
  @if(request()->is('*/ccna'))
  <div id="accordion">
    <div class="card">
      <div class="card-header bg-light py-3" id="headingOne" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <h5 class="mb-0">
          Chương 1 - Cơ bản về hệ thống mạng
        </h5>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body p-0 border-success">
          <div class="card">
            <div class="card-body py-2 d-flex justify-content-between">
              <div>
                <span
                  class="p-2 d-inline-flex justify-content-center align-items-center bg-green rounded-circle text-white mr-4"
                  style="width: 35px; height: 35px;">1</span>
                Bài 1
              </div>
              <a href="#">Preview</a>
            </div>
            <div class="card">
              <div class="card-body py-2">
                <span
                  class="p-2 d-inline-flex justify-content-center align-items-center bg-green rounded-circle text-white mr-4"
                  style="width: 35px; height: 35px;">2</span>
                Bài 2
              </div>
            </div>
            <div class="card">
              <div class="card-body py-2">
                <span
                  class="p-2 d-inline-flex justify-content-center align-items-center bg-green rounded-circle text-white mr-4"
                  style="width: 35px; height: 35px;">3</span>
                Bài 3
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if(request()->is('*/mcsa'))
    <h1>Course Content MCSA</h1>
    @endif

    @if(request()->is('*/linux'))
    <h1>Course Content LINUX</h1>
    @endif

    @if(request()->is('*/ceh'))
    <h1>Course Content CEH</h1>
    @endif

    @if(request()->is('*/chfi'))
    <h1>Course Content CHFI</h1>
    @endif

    @if(request()->is('*/php'))
    <h1>Course Content PHP</h1>
    @endif

    @if(request()->is('*/android'))
    <h1>Course Content ANDROID</h1>
    @endif

    @if(request()->is('*/graphic'))
    <h1>Course Content GRAPHIC</h1>
    @endif
</section>