@if(request()->is('*/ccna'))
<div class="container register-bg p-3">
    <div class="row ">
        <div class="col-md-12 text-center ">
            <h1 class="font-weight-bold">Sở hữu Bộ khoá học <span style="color: red;">MCSA</span> ngay hôm nay</h1>
            <h1 class="font-weight-bold ">với giá ưu đãi <span style="color: red;">1,5 triệu</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 text-center">
                    <h2 class="font-weight-bold " style="font-size: 28pt;">Thời gian ưu đãi còn</h1>
                    <h2 class="font-weight-bold " style="font-size: 22pt;">Ngày Giờ Phút Giây</h1>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endif

@if(request()->is('*/mcsa'))
<h1>Register MCSA</h1>
@endif

@if(request()->is('*/linux'))
<h1>Register LINUX</h1>
@endif

@if(request()->is('*/ceh'))
<h1>Register CEH</h1>
@endif

@if(request()->is('*/chfi'))
<h1>Register CHFI</h1>
@endif

@if(request()->is('*/php'))
<h1>Register PHP</h1>
@endif

@if(request()->is('*/android'))
<h1>Register ANDROID</h1>
@endif

@if(request()->is('*/graphic'))
<h1>Register GRAPHIC</h1>
@endif