@extends('thionline.layout.index')

@section('content')

<hr>
<div class="row" >
    <div class="col-md-8">
        <form class="row" action="danhsachdethi" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>   
            <div class="col-md-6">
                <select class="form form-control" name="MonHoc" id="">
                    <option value="100">Tất Cả</option>
                    @foreach($monhoc as $mh)
                        <option 
                        @if($ma==$mh->idMonHoc) 
                            {{ "selected" }} 
                        @endif
                        value="{{ $mh->idMonHoc }}">{{ $mh->TenMonHoc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Tìm kiếm</button>
            </div>
        </form>
        <hr>
        <strong>Danh Sach Đề Thi </strong>
        <br>
        <br>
        <div class="row danhsachdethi" >
            <ul>
                @foreach($dsdethi as $dt)
                <li>
                    <div class="panel panel-primary">
                      <div class="panel-heading" >Mã Đề Thi #{{ $dt->idDeThi }}</div>
                      <div class="panel-body">
                        <div style="height: 70px; ">
                            <p>{{ $dt->TenDeThi }}</p>
                            
                        </div>
                        <div>
                            <span class="badge">Số lượt thi: {{ $dt->SoLanThi }} lần</span>
                            <p>{{ $dt->SoLuongCau }} câu hỏi, {{ $dt->ThoiGian }} phút</p>
                            <p>Môn Học: <strong>{{ $dt->monhoc->TenMonHoc }}</strong></p>
                            <a href="HocVien/LamBaiThi/{{ $dt->idDeThi }}"><button class="btn btn-info">Vào Thi</button></a> 
                        </div>
                      </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div align="center">{!! $dsdethi->links() !!}</div>
    </div>
    <div class="col-md-4">
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