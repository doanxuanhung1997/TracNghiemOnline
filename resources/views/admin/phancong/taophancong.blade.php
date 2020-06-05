 @extends('admin.layout.index')

 @section('content')
      <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" align="center">
                                Tạo Phân Công Mới
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
                        
                            <form action="admin/phancong/them" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               {{--  {{csrf_field()}} --}}
                                <div class="form-group">
                                    <label>Chọn Giảng Viên</label>
                                    <select class="form-control" name="GiangVien">
                                        @foreach($giangvien as $gv)
                                            <option value="{{ $gv->id }}">{{ $gv->HoTen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Môn Học</label>
                                    <select class="form-control" name="MonHoc">
                                        @foreach($monhoc as $mh)
                                            <option value="{{ $mh->idMonHoc }}">{{ $mh->TenMonHoc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Hoàn Thành</button>
                            </form><a href="admin/phancong/danhsach">
                                <button style="margin-left:200px; margin-top: -57px" class="btn btn-info">Quay Lại</button></a>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
@endsection