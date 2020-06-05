<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Website Thi Thử Trắc Nghiệm Trực Tuyến</a>
            </div>
            <!-- /.navbar-header -->
            @if(Auth::check())
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <p>{{ Auth::user()->username }}</p>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="admin/thongtin/{{Auth::user()->id}}"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->HoTen }}</a>
                        </li>
                        <li><a href="admin/doimatkhau"><i class="fa fa-gear fa-fw"></i> Đổi Mật Khẩu</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                       
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
             @endif
            <!-- /.navbar-top-links -->
        
            @include('admin.layout.menu')
            <!-- /.navbar-static-side -->
        </nav>
