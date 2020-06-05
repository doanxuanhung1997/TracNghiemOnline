 @extends('admin.layout.index')

 @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">
                            Danh Sách Môn Học
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <a href="admin/monhoc/them"><button class="btn btn-primary">Thêm môn học</button></a>
                    <br>
                    <br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Môn Học</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monhoc as $mh)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$mh->idMonHoc}}</td>
                                    <td>{{$mh->TenMonHoc}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/monhoc/sua/{{$mh->idMonHoc}}"> Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/monhoc/xoa/{{$mh->idMonHoc}}"> Delete</a></td>
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