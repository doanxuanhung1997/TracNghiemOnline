 @extends('admin.layout.index')

 @section('content')
      <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" align="center">
                                Tạo Môn Học Mới
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
                        
                            <form action="admin/monhoc/them" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               {{--  {{csrf_field()}} --}}
                                <div class="form-group">
                                    <label>Tên Môn Học</label>
                                    <input type="text" class="form-control" name="TenMonHoc" placeholder="Nhập tên môn học" />
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