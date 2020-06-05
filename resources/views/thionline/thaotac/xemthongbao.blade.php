@extends('thionline.layout.index')

@section('content')

<hr>
<div class="row">
    <div class="col-md-8">
       <h3 style="font-size:25px;color:#040475;" align="center"><strong>{{ $thongbaoxem->TieuDe }}</strong></h3>
       <p style="font-style: italic;color: #bcb1b1">Ngày đăng thông báo: {{ $thongbaoxem->NgayDang }}</p>
        <p>{{ $thongbaoxem->NoiDung }}</p>
    <p style="float: right;font-style: italic;color: #666666">Người cập nhật: {{ $thongbaoxem->users->HoTen }}</p>
    <br>
    <br>

    <p style="color: #7f3f00; font-size: 20px; font-weight: bold;">Thông báo khác:</p>
    @foreach($thongbao as $tb)
    <ul style="padding-left: 20px">
        <li><a href="xemtin/{{ $tb->idTinTuc }}">{{ $tb->TieuDe }}</a></li>
    </ul>
    @endforeach
    </div>
    <div class="col-md-4">
    
    <!-- Đề thi trắc nghiệm mới -->
        <h3 class="f8">Đề Thi Trắc Nghiệm mới</h3>
        @foreach($dethi as $dt)
            @if($dt->NgayDuocTao > '2018-11-05')
            <div class="row" class="f9">
                <p class="b1" style="background-color: #e5e5e5">
                    <span class="span2">{{ $dt->SoLuongCau}} Câu</span>
                    <span class="span2">{{ $dt->ThoiGian }} Phút</span>
                    <a href="danhsachdethi/{{ $dt->monhoc->idMonHoc }}">{{ $dt->monhoc->TenMonHoc }}</a><br>
                    <a href="HocVien/LamBaiThi/{{ $dt->idDeThi }}">{{ $dt->TenDeThi }}</a>
                </p>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endsection