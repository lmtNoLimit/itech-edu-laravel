<section id="course-content">
  <h2 class="bg-success text-white">Nội dung khoá học</h2>
  @if(request()->is('*/ccna'))

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