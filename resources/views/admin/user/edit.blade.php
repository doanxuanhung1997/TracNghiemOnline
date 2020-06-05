
 @extends('admin.layout.index')

 @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">Chỉnh Sửa Tài Khoản
                            <small style="color: #560303">{{ $users->username }}</small>
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

                        <form action="admin/user/sua/{{$users->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               {{--  {{csrf_field()}} --}}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="txtUser" value="{{ $users->username }}" readonly="" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="txtPass"  value="{{ $users->password }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Họ Tên</label>
                                    <input type="text" class="form-control" name="txtName" value="{{ $users->HoTen }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Giới Tính</label><br>
                                    <select name="rdoSex">
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
                                    <input type="email" class="form-control" name="txtEmail" value="{{ $users->email }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <input type="date" class="form-control" name="birthday" value="{{ $users->NgaySinh }}"/>
                                </div>
                               
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <p>
                                        <img width="100px" src="admin_asset/upload/images/{{ $users->urlHinh }}" alt="">
                                    </p>
                                
                                    <input type="file" name="fImages">
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" name="txtAddress" value="{{$users->DiaChi }}"/>
                                </div>
                                   
                                <div class="form-group">
                                    <label>Account Level :</label>
                                    <label class="radio-inline" style="margin-left: 50px">
                                        <input name="rdoLevel" value="1" 
                                        @if($users->idtype == 1)
                                        {{"checked"}}
                                        @endif
                                        type="radio">Admin
                                    </label>
                                    <label class="radio-inline" style="margin-left: 50px">
                                        <input name="rdoLevel" value="2" 
                                        @if($users->idtype == 2)
                                        {{ "checked" }}
                                        @endif
                                        type="radio">Giảng Viên
                                    </label>
                                    <label class="radio-inline" style="margin-left: 50px">
                                        <input name="rdoLevel" value="3" 
                                        @if($users->idtype == 3)
                                        {{ "checked" }}
                                        @endif
                                        type="radio">Thành Viên
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">Hoàn Thành</button>
                                <button type="reset" style="margin-left:100px" class="btn btn-info"">Làm Mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection