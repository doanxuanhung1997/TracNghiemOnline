<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <div style="width: 100%;text-align: center;padding-top: 10px;padding-bottom: 10px;"><img style="width: 150px;height: 150px;border-radius: 50%;" src="admin_asset/upload/images/{{ Auth::user()->urlHinh }}"></div>
                            
                        </li>
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Ngân Hàng Câu Hỏi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @foreach($giangday as $gd)
                                    <li><a href="GiangVien/CauHoi/DanhSachCauHoi/{{$gd->monhoc->idMonHoc}}">{{$gd->monhoc->TenMonHoc}}</a></li>
                                @endforeach
                                <li>
                                    <a href="GiangVien/CauHoi/ThemCauHoi">Add Question</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Ngân Hàng Đề Thi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @foreach($giangday as $gd)
                                    <li><a href="GiangVien/DeThi/DanhSachDeThi/{{$gd->monhoc->idMonHoc}}">{{$gd->monhoc->TenMonHoc}}</a></li>
                                @endforeach
                                <li>
                                    <a href="GiangVien/DeThi/ThemDeThi">Add Exam</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Ngân Hàng Tài Liệu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @foreach($giangday as $gd)
                                    <li><a href="GiangVien/TaiLieu/DanhSachTaiLieu/{{$gd->monhoc->idMonHoc}}">{{$gd->monhoc->TenMonHoc}}</a></li>
                                @endforeach
                                <li>
                                    <a href="GiangVien/TaiLieu/ThemTaiLieu">Add Exam</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i>Quản Lý Tin Tuc<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="GiangVien/TinTuc/DanhSachTinTuc">Danh Sách Tin Tức</a>
                                </li>
                                <li>
                                    <a href="GiangVien/TinTuc/ThemTinTuc">Add Tin Tuc</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i>Thông Báo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="GiangVien/ThongBao/DanhSachThongBao">Danh Sách Thông Báo</a>
                                </li>
                                <li>
                                    <a href="GiangVien/ThongBao/ThemThongBao">Add Thông Báo</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="GiangVien/thongtin/{{Auth::user()->id}}"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->HoTen }}</a>
                                </li>
                                <li>
                                    <a href="GiangVien/doimatkhau">Đổi mật khẩu</a>
                                </li>
                                <li>
                                    <a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>