@extends('thionline.layout.index')

@section('content')
<div class="row f5">
    @if(Auth::check())
    <div class="col-md-5 avata" >
        <img src="admin_asset/upload/images/{{ Auth::user()->urlHinh }}" width="180px" height="180px" style="margin-top: 20px; float: right;">
        <div style="width: 180px; margin-top: 210px; margin-left: 275px">
            <p align="center" style="font-weight: bold">Thay đổi mật khẩu giúp bảo mật hơn</p>
        </div>
    </div> 
    <div class="col-md-7" style="padding-left: 30px ">
         <form name="myForm" action="svdoimatkhau/{{ Auth::user()->id }}" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h3 class="t2"><strong>ĐỔI MẬT KHẨU</strong></h3>
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
                    <input style="width: 400px" type="password" class="form-control" name="passwordcu" placeholder="Nhập Mật Khẩu Cũ" required/>
                </div>
                <div class="form-group">
                    <p>Độ dài mật khẩu từ 6 - 21 ký tự</p>
                    <input style="width: 400px" type="password" class="form-control" name="passwordmoi1" placeholder="Nhập Mật Khẩu Mới" required/>
                </div>
                <div class="form-group">
                    <input style="width: 400px" type="password" class="form-control" name="passwordmoi2" placeholder="Nhập Lại Mật Khẩu Mới" required/>
                </div>
                
                <button type="submit" class="btn btn-success">Xác Nhận Thay Đổi</button>
                <button type="reset" style="margin-left:100px" class="btn btn-info">Làm Mới</button>

                <br><br><p><strong>Lưu ý:</strong> Bạn nên sử dụng mật khẩu mạnh và chưa từng được sử dụng ở đâu khác.</p>
                            
        </form>      
    </div>
    @endif
</div>
@endsection

<script>
function validateForm() {
    var x1 = document.forms["myForm"]["passwordmoi1"].value;
    var x2 = document.forms["myForm"]["passwordmoi2"].value;
    if(x1 != x2)
    {
        alert("Mật khẩu mới không khớp. Hãy nhập lại !!!");
        return false;
    }
}
</script>

