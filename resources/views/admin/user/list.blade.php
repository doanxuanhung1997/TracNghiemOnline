
    @extends('admin.layout.index')

    @section('content')
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" align="center">
                                Danh Sách Tài Khoản
                            </h1>
                        </div>
                        <a href="admin/user/them"><button class="btn btn-primary">Tạo tài khoản</button></a>
                        <br>
                        <br>
                        <!-- /.col-lg-12 -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      
                            <thead>
                                <tr align="center">
                                    <th>UserName</th>
                                    <th>Họ Tên</th>
                                    <th>Avatar</th>
                                    <th>Email</th>
                                    <th>Địa Chỉ</th>
                                    <th>Type Account</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->HoTen }}</td>
                                        <td><img width="60px" src="admin_asset/upload/images/{{ $user->urlHinh }}" alt=""></td>
                                        <td>{{$user->email }}</td>
                                        <td>{{$user->DiaChi}}</td>
                                        <td>{{$user->typeaccount->tentype}}</td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/user/sua/{{$user->id}}"> Edit</a></td>
                                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/user/xoa/{{$user->id}}"> Delete</a></td>
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
