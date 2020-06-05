@extends('thionline.layout.index')

@section('content')
<div class="row f5">
    <div class="col-md-5 avata" >
        <img src="image/anon_user.png" width="180px" height="180px" style="margin-top: 20px; float: right;">
        <div style="width: 180px; margin-top: 210px; margin-left: 275px">
            <p align="center" style="font-weight: bold">Đăng kí để trở thành thành viên của hệ thống thi thử trực tuyến</p>
        </div>
    </div> 
    <div class="col-md-7" style="padding-left: 30px;">
        <form name="myForm" action="dangky" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h3 class="t2"><strong>ĐĂNG KÝ THÀNH VIÊN</strong></h3>
                {{--   Hiển thị lỗi bên UserController nếu có --}}
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{ $err }} <br>
                        @endforeach
                    </div>
                @endif
                 {{--  Hiển thị thông báo thành công --}}
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                        
                <div class="form-group">
                    <input style="width: 400px" type="text" class="form-control" name="txtName" placeholder="Nhập họ tên của bạn" required />
                </div>
                <div class="form-group">
                    <input style="width: 400px" type="text" class="form-control" name="txtUser" placeholder="Nhập Username" required/>
                </div>
                <div class="form-group">
                    <input style="width: 400px" type="password" class="form-control" name="txtPass" placeholder="Nhập Password" required/>
                </div>
                <div class="form-group">
                    <input style="width: 400px" type="password" class="form-control" name="txtPass2" placeholder="Nhập lại Password" required/>
                </div>
                 <div class="form-group">
                    <input style="width: 400px" type="email" class="form-control" name="txtEmail" placeholder="Nhập địa chỉ Email" required/>
                </div>
               
                <div class="form-group">
                    <label>Giới Tính</label><br>
                    <select name="rdoSex">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày Sinh</label>
                    <input style="width: 400px" type="date" class="form-control" name="birthday" required/>
                </div>
                <button type="submit" class="btn btn-success">Đăng Ký Tài Khoản</button>
                <button type="reset" style="margin-left:100px" class="btn btn-info">Làm Mới</button>

                <br><br><p>Nếu bạn đã có tài khoản thì hãy đăng nhập <a href="dangnhap"><strong>tại đây.</strong></a></p>
                            
        </form>        
    </div>
</div>
@endsection
<script>
function validateForm() {
    var x1 = document.forms["myForm"]["txtPass"].value;
    var x2 = document.forms["myForm"]["txtPass2"].value;
    if(x1 != x2)
    {
        alert("Mật khẩu mới không khớp. Hãy nhập lại !!!");
        return false;
    }
}
</script>