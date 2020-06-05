 @extends('admin.layout.index')

 @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">
                            Danh Sách Phân Công Giảng Dạy
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <a href="admin/phancong/them"><button class="btn btn-primary">Phân Công Mới</button></a>
                    <br>
                    <br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Tài Khoản Giảng Viên</th>
                                <th>Tên Giảng Viên</th>
                                <th>Môn Học</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($giangday as $pcgd)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$pcgd->users->username}}</td>
                                    <td>{{$pcgd->users->HoTen}}</td>
                                    <td>{{$pcgd->monhoc->TenMonHoc}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/phancong/sua/{{$pcgd->idGiangVienHT}}&{{$pcgd->idMonHoc}}"> Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/phancong/xoa/{{$pcgd->idGiangVienHT}}&{{$pcgd->idMonHoc}}"> Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection