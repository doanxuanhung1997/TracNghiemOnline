<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        @if(Auth::check())
        <ul class="nav" id="side-menu">
            <li>
                <div align="center">
                    <img src="admin_asset/upload/images/{{ Auth::user()->urlHinh }}" width="200px" height="200px" style="margin-top: 20px">
                    <br><br><p> Admin: {{ Auth::user()->HoTen}}</p>
                </div>
            </li>

            <li>
                <a href="admin/user/danhsach"><i class="fa fa-users fa-fw"></i> Quản Lý Tài Khoản</a>
            </li>
            <li>
                <a href="admin/monhoc/danhsach"><i class="fa fa-cube fa-fw"></i> Quản Lý Môn Học</a>
            </li>
            <li>
                <a href="admin/chude/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Quản Lý Chủ Đề MH</a>
            </li>  
            <li>
                <a href="admin/phancong/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Phân Công Giảng Dạy</a>
            </li> 
            <li>
                <a href="admin/thongtin/{{Auth::user()->id}}"><i class="fa fa-user fa-fw"></i> Xem Thông Tin</a>
            </li> 
            <li>
                <a href="admin/doimatkhau"><i class="fa fa-gear fa-fw"></i> Đổi Mật Khẩu</a>
            </li> 
            <li>
                <a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>    
        </ul>
        @endif 
    </div>
    <!-- /.sidebar-collapse -->
</div>