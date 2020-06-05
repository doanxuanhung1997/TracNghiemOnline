 @extends('admin.layout.index')

 @section('content')
      <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" align="center">
                                Tạo Tài Khoản Mới
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
                        
                            <form action="admin/user/them" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               {{--  {{csrf_field()}} --}}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="txtUser" placeholder="Please Enter Username" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="txtName" placeholder="Please Enter Full Name" />
                                </div>
                                <div class="form-group">
                                    <label>Giới Tính</label><br>
                                    <select name="rdoSex">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" />
                                </div>
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" class="form-control" name="birthday"/>
                                </div>
                               
                                <div class="form-group">
                                    <label>Images</label>
                                    <input type="file" name="fImages">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Address" />
                                </div>
                                   
                                <div class="form-group">
                                    <label>Type Account:</label>
                                    
                                    <label class="radio-inline" style="margin-left: 50px">
                                        <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                    </label>
                                    <label class="radio-inline" style="margin-left: 50px">
                                        <input name="rdoLevel" value="2" checked="" type="radio">Giảng Viên
                                    </label>
                                    <label class="radio-inline" style="margin-left: 50px">
                                        <input name="rdoLevel" value="3" checked="" type="radio">Thành Viên
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">Hoàn Thành</button>
                                <button type="reset" style="margin-left:100px" class="btn btn-info">Làm Mới</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
@endsection