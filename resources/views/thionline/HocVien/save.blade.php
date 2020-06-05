//// load 1
@extends('home_login.layout.index')
@section('content')
<!-- Hien thi bai lam -->
<style type="text/css">
	.slides{
			display: none;
		}
</style>
<div id="showExam" style="display: none;">
	<div style="color: #0040FF"><h3>{{$dethi->TenDeThi}}</h3></div><br>
	<div class="row">
		<div class="col-sm-8">
			<form name="exam" action="HocVien/NopBaiThi/{{$dethi->idDeThi}}" method="POST" enctype="multipart/form-data">
            	{{csrf_field()}}
				<div class="panel panel-info" style="padding: 15px 15px 15px 15px;">

					<?php $cau=0; ?>
			      	<div id="danhsach">
			      		
			      	</div>
			      	
					<?php $st=1; ?>
			      	<?php
						foreach ($chitietdethi as $ctdt) {
							while ($st <= $sotrang) {
								echo "<span style='color:red;cursor: pointer;margin-right:20px;' class='xemthem' idch='".$ctdt->idCauHoi."'>".$st."</span>";
								$st+=1;
								break;
							}
						}
					?>

			      <div style="width: 100%;text-align: center;"><button class="btn btn-danger" type="submit">Nộp Bài Xem Kết Quả</button></div>
			      
			    </div>
			    
			    
			</form>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
		      <div class="panel-heading">THỜI GIAN LÀM Bài</div>
		      <div class="panel-body" style="text-align: center;">
		      	<div class="test" id="gio">0</div>
				<div class="test" id="phut">{{$dethi->ThoiGian}}</div>
				<div class="test" id="giay">0</div>
				<style type="text/css">
					.test{
						display: none;
					}
					.time{
						font-size: 25px;
					}
				</style>
	
	
		      	<span><img style="width: 50px;height: 50px;" src="images/iconclock.jpg"></span>
		      	<span id="h" class="time"></span>H : <span id="m" class="time"></span>M : <span id="s" class="time"></span> S
		      	<div style="color: red;">Chú ý: Bạn cần xem lại kỹ đáp án trước khi nộp bài thi nếu chưa hết thời gian, khi nộp bài bạn không có quyền sửa bất kỳ thông tin nào;</div><br>
		      	<p style="color: #088A85;">Bài thi sẽ tự động kết thúc khi hết thời gian làm bài</p>
		      </div>
		    </div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	var gio=document.getElementById('gio').innerHTML;
	var phut=document.getElementById('phut').innerHTML;
	var giay=document.getElementById('giay').innerHTML;
	$(document).ready(function(){
		$ok=confirm("Bạn Đã Sẵn Thi!");
		if($ok==true){
			$('#showExam').show();
			gogogo();
		}
	});
	function gogogo(){
		var hetgio=1;
		if(giay===-1){
			phut-=1;
			giay=59;
		}
		if(phut===-1){
			gio-=1;
			phut=59;
		}
		if(gio===-1){
			//alert("het gio");
			hetgio=0;
			gio=0;
			phut=0;
			giay=0;
		}
		document.getElementById('h').innerHTML = gio;
		document.getElementById('m').innerHTML = phut;
		document.getElementById('s').innerHTML = giay;
			//alert(gio.innerHTML + ": "+ phut.innerHTML+" : "+giay.innerHTML);
			 
		giay--;
		if(hetgio===1){setTimeout(gogogo,1000);}
		if(hetgio===0){document.exam.submit();}
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var id=<?php echo $dethi->idDeThi; ?>;
		$.get('pagesDaoTao/CauHoi/cauhoiPhanTrang.php',{idMH:id},function(data){
			$('#danhsach').html(data);
		});
		$.get("HocVien/Ajax/CauHoiTrongDeThi/"+id,function(data){
                   $("#danhsach").html(data);
               });
		$('.xemthem').click(function(){
			//var trang=$(this).html();
			var idCH=$(this).attr('idCH');
			$.get("HocVien/Ajax/CauHoiTrongDeThi2/"+idCH,function(data){
                   $("#danhsach").html(data);
               });
		});
		//var slideIndex=1;
		$(".dots").click(function(){
			var n=$(this).html();
			var slide=document.getElementsByClassName("slides");
			var dots=document.getElementsByClassName("dots");
			//if(n > slide.length){slideIndex=1;}
			//if(n<1){slideIndex=slide.length};
			for(var i=0;i<slide.length;i++){
				slide[i].style.display="none";
			};
			slide[n-1].style.display="block";
		});
	});
</script>
@endsection


// load 2

@extends('home_login.layout.index')
@section('content')
<!-- Hien thi bai lam -->
<div id="showExam" style="display: none;">
	<div style="color: #0040FF"><h3>{{$dethi->TenDeThi}}</h3></div><br>
	<div class="row">
		<div class="col-sm-8">
			<form name="exam" action="HocVien/NopBaiThi/{{$dethi->idDeThi}}" method="POST" enctype="multipart/form-data">
            	{{csrf_field()}}
				<div class="panel panel-info" style="padding: 15px 15px 15px 15px;">
					<?php $cau=1; ?>
			      	@foreach($chitietdethi as $ctdt)
			      	@foreach($cauhoi as $ch)
			      	@if($ctdt->idCauHoi==$ch->idCauHoi)
			      	<div class="panel panel-info">
				    	<div class="panel-heading"><?php echo "Câu ".$cau." :"; ?><br>
				    		<?php echo $ch->NoiDung ?><br>
				    		@if($ch->urlHinh !="")
				    		<div style="width: 100%;text-align: center;">
				    			<img style="width: 400px;height: 250px;" src="Upload/CauHoi/{{$ch->urlHinh}}">
				    		</div>
				    		@endif
				    	</div>
				      	<div class="panel-body">
				      		<div class="row">
				      			<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="A" ><?php echo $ch->PhuongAnA ?></label></div>
				      			<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="B" ><?php echo $ch->PhuongAnB ?></label></div>
				      			<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="C" ><?php echo $ch->PhuongAnC ?></label></div>
				      			<div class="col-sm-6"><label class="radio-inline"><input type="radio" name="cau{{$cau}}" value="D" ><?php echo $ch->PhuongAnD ?></label></div>
				      		</div>
				      		
				      	</div>
				    </div>
				    @break
			      	@endif
			      	@endforeach
			      	<?php $cau+=1; ?>
			      	@endforeach
			      
			      <div style="width: 100%;text-align: center;"><button class="btn btn-danger" type="submit">Nộp Bài Xem Kết Quả</button></div>
			      
			    </div>
			    
			    
			</form>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
		      <div class="panel-heading">THỜI GIAN LÀM Bài</div>
		      <div class="panel-body" style="text-align: center;">
		      	<div class="test" id="gio">0</div>
				<div class="test" id="phut">{{$dethi->ThoiGian}}</div>
				<div class="test" id="giay">0</div>
				<style type="text/css">
					.test{
						display: none;
					}
					.time{
						font-size: 25px;
					}
				</style>
	
	
		      	<span><img style="width: 50px;height: 50px;" src="images/iconclock.jpg"></span>
		      	<span id="h" class="time"></span>H : <span id="m" class="time"></span>M : <span id="s" class="time"></span> S
		      	<div style="color: red;">Chú ý: Bạn cần xem lại kỹ đáp án trước khi nộp bài thi nếu chưa hết thời gian, khi nộp bài bạn không có quyền sửa bất kỳ thông tin nào;</div><br>
		      	<p style="color: #088A85;">Bài thi sẽ tự động kết thúc khi hết thời gian làm bài</p>
		      </div>
		    </div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	var gio=document.getElementById('gio').innerHTML;
	var phut=document.getElementById('phut').innerHTML;
	var giay=document.getElementById('giay').innerHTML;
	$(document).ready(function(){
		$ok=confirm("Bạn Đã Sẵn Thi!");
		if($ok==true){
			$('#showExam').show();
			gogogo();
		}
	});
	function gogogo(){
		var hetgio=1;
		if(giay===-1){
			phut-=1;
			giay=59;
		}
		if(phut===-1){
			gio-=1;
			phut=59;
		}
		if(gio===-1){
			//alert("het gio");
			hetgio=0;
			gio=0;
			phut=0;
			giay=0;
		}
		document.getElementById('h').innerHTML = gio;
		document.getElementById('m').innerHTML = phut;
		document.getElementById('s').innerHTML = giay;
			//alert(gio.innerHTML + ": "+ phut.innerHTML+" : "+giay.innerHTML);
			 
		giay--;
		if(hetgio===1){setTimeout(gogogo,1000);}
		if(hetgio===0){document.exam.submit();}
	}
</script>
@endsection