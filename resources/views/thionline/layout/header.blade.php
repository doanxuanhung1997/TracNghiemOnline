
<div class="row">
    <div class="row header">
        <div class="col-md-6">
            <ul>
                <li style="margin-left: 80px"><a href="trangchu">Trang chủ</a></li>
                <li><a href="#">Diễn đàn</a></li>
                <li><a href="#">Hỏi đáp</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul style="float: right;">
                @if(Auth::check())
                    <li><a href="thongtinsv">{{ Auth::user()->HoTen }}</a></li>
                    <li><a href="HocVien/LichSuHocTap" class="row_cnt1" > Lich Su Hoc Tap</a></li>
                    <li><a href="svdoimatkhau">Đổi Mật Khẩu</a></li>
                    <li><a href="logout">Đăng Xuất</a></li>
                @else
                    <li style=""><a href="dangky">Đăng Ký</a></li>
                    <li><a href="dangnhap">Đăng Nhập</a></li>
                @endif
            </ul>
        </div> 
 
    </div>
    <div id="menu_monhoc">
        <ul>
            @foreach($monhoc as $mh)
            <li><a href="danhsachdethi/{{ $mh->idMonHoc }}">{{ $mh->TenMonHoc }}</a></li>
            @endforeach
            <li><a href="tailieu">Tài Liệu</a></li>
        </ul>
    </div>
</div>
