@extends('thionline.layout.index')
@section('content')

<div class="row" id="chitietdethi">
	<div class="col-sm-8 panel panel-default" style="padding-top: 20px;padding-bottom: 20px;">
		<div style="color: #0040FF">{{$dethi->TenDeThi}}</div><br>
		<div>
			<table class="table table-bordered" cellpadding="4" cellspacing="4">
				<thead>
					<tr>
						<th>Thời Gian<br>Làm Bài Thi</th>
						<th><h3>{{$dethi->ThoiGian}} phút</h3></th>
						<th colspan="2">
							@if($idUser!="")
							<a href="HocVien/DoTest/{{$dethi->idDeThi}}"><button type="button" class="btn btn-danger">Bat Dau Lam Bai</button></a>
							<p>Hãy nhấn vào nút bắt đầu bắt đầu để thi</p></th>
							@else
							<a href="dangnhap"><button type="button" class="btn btn-danger">Hay Dang Nhap De Thuc Hien Bai Thi</button></a>
							@endif
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Môn Học</td>
						<td><p style="color: #0404B4;">{{$dethi->monhoc->TenMonHoc}}</p></td>
						<td>Ngày Đăng</td>
						<td><p style="color: #0404B4;">{{$dethi->NgayDuocTao}}</p></td>
					</tr>
					<tr>
						<td>Số Lượng Câu</td>
						<td><p style="color: #0404B4;">{{$dethi->SoLuongCau}}</p></td>
						<td>Số Lượt Đã Thi</td>
						<td><p style="color: #0404B4;">{{$dethi->SoLanThi}}</p></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-info">
	    	<div class="panel-heading" style="text-align: center;">Các Đề Thi Liên Quan</div>
	    	<div class="panel-body">
	    		@foreach($dethikhac as $dtk)
	    		<a href="HocVien/LamBaiThi/{{$dtk->idDeThi}}">{{$dtk->TenDeThi}}</a><br>
	    		@endforeach
	    	</div>
	    </div>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#start').click(function(){
			//$('#chitietdethi').hide();
			$('#showExam').show();
		});
	});
</script>
@endsection