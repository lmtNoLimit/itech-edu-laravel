@if(request()->is('*/ccna'))
  <h1 class="text-center" style="font-size: 28px; font-weight: bold; color: #28a745">HÌNH ẢNH VỀ KHOÁ HỌC CCNA TẠI I-TECH</h1>
  <marquee behavior="alternate" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
    @for($i = 1; $i <=7; $i++)
      <img src="{{asset('/images/slider/ccna')}}{{'/'.$i.'.jpg'}}" width="300px" height="220px" alt="CCNA" style="margin-left: 7px"/>
    @endfor
  </marquee>
@endif

@if(request()->is('*/mcsa'))
  <h1 class="text-center" style="font-size: 28px; font-weight: bold; color: #28a745">HÌNH ẢNH VỀ KHOÁ HỌC MCSA TẠI I-TECH</h1>
  <marquee behavior="alternate" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
    @for($i = 1; $i <= 7; $i++)
      <img src="{{asset('/images/slider/mcsa')}}{{'/'.$i.'.jpg'}}" width="300px" height="220px" alt="MCSA" style="margin-left: 7px"/>
    @endfor
  </marquee>
@endif
    
@if(request()->is('*/linux'))
    <h1 class="text-center" style="font-size: 28px; font-weight: bold; color: #28a745">HÌNH ẢNH VỀ KHOÁ HỌC LINUX TẠI I-TECH</h1>
    <marquee behavior="alternate" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
      @for($i = 1; $i <= 16; $i++)
        <img src="{{asset('/images/slider/linux')}}{{'/'.$i.'.jpg'}}" width="300px" height="220px" alt="LINUX" style="margin-left: 7px"/>
      @endfor
    </marquee>
@endif

@if(request()->is('*/ceh'))
<h1 class="text-center" style="font-size: 28px; font-weight: bold; color: #28a745">HÌNH ẢNH VỀ KHOÁ HỌC CEH TẠI I-TECH</h1>

@endif

@if(request()->is('*/chfi'))
<h1 class="text-center" style="font-size: 28px; font-weight: bold; color: #28a745">HÌNH ẢNH VỀ KHOÁ HỌC CHFI TẠI I-TECH</h1>
<marquee behavior="alternate" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
  @for($i = 1; $i <= 23; $i++)
    <img src="{{asset('/images/slider/chfi')}}{{'/'.$i.'.jpg'}}" width="200px" height="150px" alt="CHFI" style="margin-left: 7px"/>
  @endfor
</marquee>
@endif

@if(request()->is('*/php'))
  <h1 class="text-center" style="font-size: 28px; font-weight: bold; color: #28a745">HÌNH ẢNH VỀ KHOÁ HỌC PHP TẠI I-TECH</h1>
  <marquee behavior="alternate" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
    @for($i = 1; $i <= 26; $i++)
      <img src="{{asset('/images/slider/mcsa')}}{{'/'.$i.'.jpg'}}" width="300px" height="220px" alt="PHP" style="margin-left: 7px"/>
    @endfor
  </marquee>
@endif

@if(request()->is('*/android'))
<h1>Slider ANDROID</h1>
@endif

@if(request()->is('*/graphic'))
<h1>Slider GRAPHIC</h1>
@endif