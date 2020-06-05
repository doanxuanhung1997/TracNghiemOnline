<div class="panel panel-info">
	<div class="panel-heading"><br>
	<?php echo $cauhoi->NoiDung ?><br>
	@if($cauhoi->urlHinh !="")
	<div style="width: 100%;text-align: center;">
		<img style="width: 400px;height: 250px;" src="Upload/CauHoi/{{$cauhoi->urlHinh}}">
	</div>
	@endif
	</div>
	<div class="panel-body">
	<label class="radio-inline"><input type="radio" name="cau{{$cauhoi->idCauHoi}}" value="A" ><?php echo $cauhoi->PhuongAnA ?></label><br>
	<label class="radio-inline"><input type="radio" name="cau{{$cauhoi->idCauHoi}}" value="B" ><?php echo $cauhoi->PhuongAnB ?></label><br>
	<label class="radio-inline"><input type="radio" name="cau{{$cauhoi->idCauHoi}}" value="C" ><?php echo $cauhoi->PhuongAnC ?></label><br>
	<label class="radio-inline"><input type="radio" name="cau{{$cauhoi->idCauHoi}}" value="D" ><?php echo $cauhoi->PhuongAnD ?></label><br>
	</div>
</div>
				   
			   
			      
			      	
			      	
			      