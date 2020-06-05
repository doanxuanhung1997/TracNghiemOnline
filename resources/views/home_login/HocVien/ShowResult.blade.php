@extends('home_login.layout.index')
@section('content')
<div style="color: red"><h4>Bạn Đã Hoàn Thành Bài Thi Với {{$diem}}</h4></div>
<div id="showResult">
	<div class="col-sm-8" style="color: #0040FF"><h3>Đáp Án {{$dethi->TenDeThi}}</h3></div><br>
	<div class="row">
		<div class="col-sm-8">
		<?php $cau=0; ?>
		@foreach($ctdt as $ct)
		<?php $cau+=1; ?>
		@foreach($dsch as $ch)
		@if($ct->idCauHoi==$ch->idCauHoi)
	
		
			<div class="panel panel-info" style="padding: 15px 15px 15px 15px;">
			<div class="panel-heading"><p style="font-size:20px;"><?php echo "Câu ".$cau." :"; ?></p>
			<?php echo $ch->NoiDung ?>
			@if($ch->urlHinh !="")
				<div style="width: 100%;text-align: center;">
					<img style="width: 400px;height: 250px;" src="Upload/CauHoi/{{$ch->urlHinh}}">
				</div>
			@endif
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="A" ><?php echo $ch->PhuongAnA;?></label><?php if($dspa[$cau-1]==='A' && $dspa[$cau-1]!=$ch->DapAn){echo "<img style='width:20px;height:20px;' src='images/iconfalse.jpg'>";} if($ch->DapAn==='A') {echo "<img style='width:20px;height:20px;' src='images/icontrue.jpg'>";}?></div>
					<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="B" ><?php echo $ch->PhuongAnB;?></label><?php if($dspa[$cau-1]==='B' && $dspa[$cau-1]!=$ch->DapAn){echo "<img style='width:20px;height:20px;' src='images/iconfalse.jpg'>";} if($ch->DapAn==='B') {echo "<img style='width:20px;height:20px;' src='images/icontrue.jpg'>";}?></div>
					<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="C" ><?php echo $ch->PhuongAnC;?></label><?php if($dspa[$cau-1]==='C' && $dspa[$cau-1]!=$ch->DapAn){echo "<img style='width:20px;height:20px;' src='images/iconfalse.jpg'>";} if($ch->DapAn==='C') {echo "<img style='width:20px;height:20px;' src='images/icontrue.jpg'>";}?></div>
					<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="D" ><?php echo $ch->PhuongAnD;?></label><?php if($dspa[$cau-1]==='D' && $dspa[$cau-1]!=$ch->DapAn){echo "<img style='width:20px;height:20px;' src='images/iconfalse.jpg'>";} if($ch->DapAn==='D') {echo "<img style='width:20px;height:20px;' src='images/icontrue.jpg'>";}?></div>
				</div>
			</div>
			<div id="note" style="color: red">Bởi vì : <?php echo "$ch->ChuThich"; ?></div>
			</div>
		
		@endif
		@endforeach
		@endforeach	
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
	
</div>
@endsection
@section('script')
@endsection