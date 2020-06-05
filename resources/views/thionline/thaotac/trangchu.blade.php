@extends('thionline.layout.index')

@section('content')

<div class="row f1" >
    <div class="col-md-5" >
        <img src="http://thithu24h.com/media/articles/2018_09/photo-0-15378485494341775930303.jpg" alt="logo thi THPT Quốc Gia năm 2019" style="width:85%;height:32%;">
        <h3 class="t1">Thi THPT Quốc Gia năm 2019:"Đề thi không phục vụ mục tiêu "2 trong 1".</h3>
        <p class="cnt1">Bộ trưởng bộ GD&ĐT Phùng Xuân Nhạ cho biết trong năm tới đề thi không phục mục tiêu kì thi "2 trong 1" mà phục vụ đánh giá thực chất chất lượng dạy và... </p>
    </div>
    <div class="col-md-4" >
        <h4>Tin Tức</h4>
        <ul>
            @foreach($tintuc as $tt)
            <li><a href="xemtin/{{ $tt->idTinTuc }}">{{ $tt->TieuDe }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-3" >
        <h4>Thông Báo</h4>
        <ul>
            @foreach($thongbao as $tb)
            <li><a href="xemthongbao/{{ $tb->idThongBao }}">{{ $tb->TieuDe }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<hr>
<div class="row" >
    <div class="col-md-8">
        @foreach($monhoc as $mh)
        
            <div class="row" >
                 <div class="col-md-10"><p class="t1">Đề thi thử {{ $mh->TenMonHoc }}</p></div>
                 <div class="col-md-2" ><a href="danhsachdethi/{{ $mh->idMonHoc }}"><button class="btn1">+Xem tất cả</button></div></a>
            </div>
            <?php for($i=0;$i<$dem;$i++){ ?>
                @if($dsch[$i]->idMonHoc==$mh->idMonHoc)
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="HocVien/LamBaiThi/{{ $dsch[$i]->idDeThi }}" class="link">Mã đề thi<br>#{{ $dsch[$i]->idDeThi }}</a></div>
                        <div class="box2" style="padding-left: 15px">
                            <p class="t2"><a href="HocVien/LamBaiThi/{{ $dsch[$i]->idDeThi }}">{{ $dsch[$i]->TenDeThi }}</a></p>
                            <p class="t3">
                                <span class="span1">{{ $dsch[$i]->SoLuongCau }} câu</span>
                                <span class="span1">{{ $dsch[$i]->ThoiGian }} phút</span>
                                <a href="">{{ $dsch[$i]->NgayDuocTao }}</a>
                            </p>
                       </div>
                    </div>
                </div>
                @endif
            <?php } ?>
            <hr>
        @endforeach   
 
    </div>
    <div class="col-md-4">
    <!-- Điểm cao trong tuần -->
        <h3 style="font-size:21px;color:blueviolet"><strong>Top 5 điểm cao nhất</strong></h3>
        @foreach($topdiem as $td)
        @foreach($user as $u)
            @if($td->idHocVien==$u->id)
        <div class="row f6">
            <div class="col-md-12">
                <div class="box3"><img style="width: 100%; height: 75px;" src="admin_asset/upload/images/{{$u->urlHinh}}"></div>
                <div class="box4">
                    <p class="f7">{{$u->HoTen}}<br>
                    {{$td->TenDeThi}}
                        <br>
                        <span class="span1">{{$td->DiemSo}} điểm</span>
                        vào {{$td->created_at}}
                    </p>
               </div>
            </div>
        </div>
            @break
            @endif
        @endforeach
        @endforeach
    <!-- Đề thi trắc nghiệm mới -->
        <h3 class="f8">Đề Thi Trắc Nghiệm mới</h3>
        @foreach($dethi as $dt)
            @if($dt->NgayDuocTao > '2018-10-14')
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