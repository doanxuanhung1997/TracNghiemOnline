 @extends('home_login.layout.index')

@section('content')
<div class="row header ">
    <div class="col-md-1 f6 f11"><a href="">Trang chủ</a></div>
    <div class="col-md-2 f6"><a href="">Thành viên</a></div>
</div>
<div class="row f5">
    <div class="col-md-5 avata" >
        <img src="image/anon_user.png" width="180px" height="180px" style="margin-top: 20px; float: right;">
    </div> 
    <div class="col-md-7" style="padding-left: 30px ">
        <form action="login" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h3 class="t2"><strong>ĐĂNG NHẬP TÀI KHOẢN</strong></h3>
                <label class="cnt1 f11" >Tên đăng nhập </label><br>
                <input type="text" name="UserName" class="f12"><br>
                <label class="cnt1 f11 f6">Mật khẩu - <a href=""> Quên mật khẩu</a></label><br>
                <input type="password" name="PassWord" class="f12"><br>
                <button type="submit" class="f6 btn2" >Đăng nhập tài khoản</button><br><br>
                <p>Nếu bạn chưa có tài khoản thì hãy đăng kí <a href="#">tại đây</a><br>
                <ul class="cnt1">
                    <li><a href="">Hướng dẫn làm bài thi trắc nghiệm</a><br></li>
                    <li><a href="">Hướng dẫn chi tiết đăng kí và nâng cấp tài khoản.</a><br>
                    <li><a href="">Danh sách tất cả các đề thi theo mẫu</a><br>
                    <li><a href="">Quyền của thành viên</a></li>
                </ul>
        </form>        
    </div>
</div>
@endsection