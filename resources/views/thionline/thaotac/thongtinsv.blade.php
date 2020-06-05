@extends('thionline.layout.index')

@section('content')
<div class="row f5">
    @if(Auth::check())
    <div class="col-md-5 avata" >
        <img src="admin_asset/upload/images/{{ Auth::user()->urlHinh }}" width="180px" height="180px" style="margin-top: 20px; float: right;">
        <div style="width: 180px; margin-top: 210px; margin-left: 275px;">
            <button onclick="chinhsua()" style="margin-left: 15px" class="btn btn-info">Thay Đổi Thông Tin</button> 
            <p align="center">Click vào nút trên để thay đổi thông tin</p>   
        </div>
    </div> 
    <div class="col-md-7" style="padding-left: 30px;">
        <form name="myForm" action="thongtinsv/{{ Auth::user()->id }}" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h3 class="t2"><strong>THÔNG TIN THÀNH VIÊN</strong></h3>
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
                    <label>Username</label>
                    <input style="width: 400px" type="text" class="form-control" name="txtUser" value="{{ Auth::user()->username }}" readonly="" />
             
                    <label>Họ Tên</label>
                    <input style="width: 400px" type="text" id="hoten" class="form-control" name="txtName" value="{{ Auth::user()->HoTen }}" required disabled/>
              
                    <label>Giới Tính</label><br>
                    <select name="rdoSex" id="gioitinh" disabled>
                        <option
                        @if(Auth::user()->GioiTinh==1) 
                                {{ "selected" }} 
                        @endif
                        value="1">Nam</option>
                        <option
                        @if(Auth::user()->GioiTinh==0) 
                                {{ "selected" }} 
                        @endif
                        value="0">Nữ</option>
                    </select>
                    <br>
                    <label>Email</label>
                    <input style="width: 400px" type="email" id="email" class="form-control" name="txtEmail" value="{{ Auth::user()->email }}" required disabled/>
                
                    <label>Ngày Sinh</label>
                    <input style="width: 400px" type="date" id="ngaysinh"  class="form-control" name="birthday" value="{{ Auth::user()->NgaySinh }}" required disabled/>
          
                    <label>Ảnh Đại Diện</label>
                    <input type="file" id="avatar" name="fImages" disabled>
                
                    <label>Địa Chỉ</label>
                    <input style="width: 400px" type="text" class="form-control" id="diachi" name="txtAddress" value="{{ Auth::user()->DiaChi }}" required disabled=""/>
                </div>
                <div style="display: none;" id="sua">
                        <button type="submit" class="btn btn-success">Hoàn Thành</button>
                        <button type="reset" style="margin-left:100px;" class="btn btn-info"">Làm Mới</button>
                </div>
        </form>        
    </div>
    @endif
</div>
@endsection
<script>
function chinhsua() {
    // dùng jquery
    $('#sua').show(); //show button submit
    //bật enable các input để sửa
    $('#hoten').removeAttr('disabled');
    $('#ngaysinh').removeAttr('disabled');
    $('#gioitinh').removeAttr('disabled');
    $('#email').removeAttr('disabled');

    //java script
    document.getElementById("diachi").disabled = false;
    document.getElementById("avatar").disabled = false;
    }
</script>