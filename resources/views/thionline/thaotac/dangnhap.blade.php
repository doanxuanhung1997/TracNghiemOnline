@extends('thionline.layout.index')

@section('content')
<div class="row f5">
    <div class="col-md-5 avata" >
        <img src="image/anon_user.png" width="180px" height="180px" style="margin-top: 20px; float: right;">
        <div style="width: 180px; margin-top: 210px; margin-left: 275px">
            <p align="center" style="font-weight: bold">Đăng nhập để tham gia vào hệ thống thi thử trực tuyến</p>
        </div>
    </div> 
    <div class="col-md-7" style="padding-left: 30px ">
        <form action="login" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h3 class="t2"><strong>ĐĂNG NHẬP TÀI KHOẢN</strong></h3>
                {{--  Hiển thị thông báo khi đăng nhâp không thành công --}}
                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{ session('thongbao') }}
                    </div>
                @endif

                <label class="cnt1" >Tên đăng nhập </label><br>
                <input style="width: 400px" type="text" class="form-control" name="UserName" placeholder="Nhập username" required />
                
                <label class="cnt1">Mật khẩu</label><br>
                <input style="width: 400px" type="password" class="form-control" name="PassWord" placeholder="Nhập password" required />
                <br>

                <button type="submit" class="btn btn-success" >Đăng nhập tài khoản</button><br><br>
                <p>Nếu bạn chưa có tài khoản thì hãy đăng ký <a href="dangky"><strong>tại đây.</strong></a></p>
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