@extends('thionline.layout.index')

@section('content')

<div class="row">
    <div class="col-md-8">
       <h3 style="font-size:25px;color:#040475;" align="center"><strong>Tài Liệu Học Tập</strong></h3>
       <div class="row">
       	@foreach($tailieu as $tl)
       	<div class="col-md-3">
       		<div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center;" >Mã Tài Liệu #{{$tl->idTaiLieu}}</div>
                    <div class="panel-body">
                        <div style="width: 100%;text-align: center;">
                            <p>{{$tl->TenTaiLieu}}</p>
                            <p>Môn Học: <strong>{{$tl->monhoc->TenMonHoc}}</strong></p>
                            <p style="color: red">{{$tl->Type}}</p>
                            <a href="Upload/TaiLieu/{{$tl->urlFile}}" download="{{$tl->urlFile}}">
  <button type='button' class='btn btn-info'>Download</button>
</a>
                        </div>
                    </div>
                </div>
       		</div>
       		@endforeach
       	</div>
       	
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