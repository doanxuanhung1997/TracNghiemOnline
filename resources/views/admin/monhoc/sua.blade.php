
 @extends('admin.layout.index')

 @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center"> 
                        	Chỉnh Sửa Môn Học 
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

                        <form action="admin/monhoc/sua/{{$monhoc->idMonHoc}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               {{--  {{csrf_field()}} --}}
                                <div class="form-group">
                                    <label>Môn Học</label>
                                    <input type="text" class="form-control" name="TenMonHoc" value="{{ $monhoc->TenMonHoc }}" />
                                </div>
                                
                                <button type="submit" class="btn btn-success">Sửa</button>
                                <button type="reset" style="margin-left:100px" class="btn btn-info">Làm Mới</button>
                               {{--  <a href="admin/monhoc/danhsach" target="_blank"><input type="button" value="Quay Lại" class="btn btn-default"></a>
                                 --}}
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection