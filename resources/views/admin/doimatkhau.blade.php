@extends('admin.layout.index')

 @section('content')
      <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" align="center">
                                Đổi Mật Khẩu
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
                            @if(Auth::check())
                            <form name="myForm" onsubmit="return validate_form()" action="admin/doimatkhau/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" >
                            @endif
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               {{--  {{csrf_field()}} --}}
                                
                                <div class="form-group">
                                    <label>Mật Khẩu Hiện Tại</label>
                                    <input type="password" class="form-control" name="passwordcu" placeholder="Nhập Mật Khẩu Hiện Tại" required/>
                                </div>
                               
                                <div class="form-group">
                                    <label>Mật Khẩu Mới</label>
                                    <input type="password" class="form-control" name="passwordmoi1" placeholder="Nhập Mật Khẩu Mới" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu Mới</label>
                                    <input type="password" class="form-control" name="passwordmoi2" placeholder="Nhập Lại Mật Khẩu Mới" required />
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

<script>
    function validate_form() {
        var x1 = document.forms["myForm"]["passwordmoi1"].value;
        var x2 = document.forms["myForm"]["passwordmoi2"].value;
        if(x1 != x2)
        {
            alert("Mật khẩu mới không khớp. Hãy nhập lại !!!");
            return false;
        }
    }
</script>