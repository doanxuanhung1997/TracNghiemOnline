 @extends('thionline.layout.index')

@section('content')
@if(session('thongbao'))
<div class="alert alert-success">
{{session('thongbao')}}
</div>
  @endif
<h3 style="color: #2E9AFE">Danh Sách Các Bài Thi Đã Hoàn Thành Của Bạn</h3>
<div class="row" >
    <div class="col-md-8">
        <table class="table table-bordered">
        	<thead>
        		<tr>
                    <th>STT</th>
        			<th>De Thi</th>
        			<th>Diem So</th>
        			<th>Thoi Gian</th>
        		</tr>
        	</thead>
        	<tbody>
                <?php $stt=0; ?>
                @foreach($bangdiem as $bd)
                <?php $stt+=1; ?>
        		<tr>
                    <td><?php echo $stt ?></td>
        			<td><?php echo $bd->TenDeThi?></td>
                    <td>{{$bd->DiemSo}}</td>
        			<td>{{$bd->NgayLamBai}}</td>
        		</tr>
        		@endforeach
        	</tbody>
        </table>
    </div>
    <div class="col-md-4">
        <!-- Điểm cao trong tuần -->
        <h3 style="font-size:21px;color:blueviolet"><strong>Top điểm cao trong 7 ngày qua</strong></h3>
        @foreach($topdiem as $td)
         @foreach($user as $u)
             @if($td->idHocVien==$u->id)
        <div class="row f6">
            <div class="col-md-12">
                <div class="box3"><img style="width: 100%; height: 75px;" src="admin_asset/upload/images/{{$u->urlHinh}}"></div>
                <div class="box4">
                    <p class="f7">{{$u->HoTen}}
                        <br>
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