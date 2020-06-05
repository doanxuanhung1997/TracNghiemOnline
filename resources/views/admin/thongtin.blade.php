
 @extends('admin.layout.index')

 @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">Thông Tin {{ $users->typeaccount->tentype}} :
                            <small style="color: #560303;">{{ $users->username }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">


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
                        <button onclick="chinhsua()" class="btn btn-info">Chỉnh Sửa</button><br><br>
                        <form action="admin/thongtin/{{$users->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               {{--  {{csrf_field()}} --}}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="txtUser" value="{{ $users->username }}" readonly="" />
                                </div>
                            
                                <div class="form-group">
                                    <label>Họ Tên</label>
                                    <input type="text" id="hoten" class="form-control" name="txtName" value="{{ $users->HoTen }}" disabled="" />
                                </div>
                                <div class="form-group">
                                    <label>Giới Tính</label><br>
                                    <select name="rdoSex" id="gioitinh" disabled>
                                        <option
                                        @if($users->GioiTinh==1) 
                                                {{ "selected" }} 
                                        @endif
                                        value="1">Nam</option>
                                        <option
                                        @if($users->GioiTinh==0) 
                                                {{ "selected" }} 
                                        @endif
                                        value="0">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email" class="form-control" name="txtEmail" value="{{ $users->email }}" disabled/>
                                </div>
                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <input type="date" id="ngaysinh"  class="form-control" name="birthday" value="{{ $users->NgaySinh }}" disabled/>
                                </div>
                               
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <p>
                                        <img width="100px" src="admin_asset/upload/images/{{ $users->urlHinh }}" alt="">
                                    </p>
                                
                                    <input type="file" id="avatar" name="fImages" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" id="diachi" name="txtAddress" value="{{$users->DiaChi }}" disabled=""/>
                                </div>
                                <br>
                                <div style="display: none;" id="sua">
                                        <button type="submit" class="btn btn-success">Hoàn Thành</button>
                                        <button type="reset" style="margin-left:100px;" class="btn btn-info"">Làm Mới</button>
                                </div>
                            </form>
                    </div>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

<script>
    function chinhsua() {
        // dùng jquery
        $('#sua').show();
        //bật enable các input để sửa
        $('#hoten').removeAttr('disabled');
        $('#ngaysinh').removeAttr('disabled');
        $('#gioitinh').removeAttr('disabled');
        $('#email').removeAttr('disabled');

        //java script
        document.getElementById("diachi").disabled = false;
        document.getElementById("avatar").disabled = false;
        // document.getElementById("rd1").disabled = false;
        // document.getElementById("rd2").disabled = false;
        // document.getElementById("rd3").disabled = false;
    }
</script>