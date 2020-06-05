 @extends('admin.layout.index')

 @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">
                            Danh Sách Chủ Đề Môn Học
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <a href="admin/chude/them"><button class="btn btn-primary">Thêm chủ đề môn học</button></a>
                    <br>
                    <br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Chủ Đề</th>
                                <th>Môn Học</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chude as $cd)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$cd->idChuDe}}</td>
                                    <td>{{$cd->TenChuDe}}</td>
                                    <td>{{$cd->monhoc->TenMonHoc}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/chude/sua/{{$cd->idChuDe}}"> Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/chude/xoa/ {{$cd->idChuDe}}"> Delete</a></td>
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