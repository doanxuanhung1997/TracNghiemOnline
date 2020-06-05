@extends('home_login.layout.index')
@section('content')
<!-- Hien thi bai lam -->
<style type="text/css">
	.slides{
			display: none;
		}
		.dots{
			width: 30px;
			height: 30px;
			border: 1px solid black;
			background: white;
			padding: 5px;
			border-radius: 5px;
			cursor: pointer;
		}
		.active,.dots:hover{
			background: #333;
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
			      		@foreach($chitietdethi as $ctdt)
			      		<?php $cau+=1; ?>
				      	@foreach($cauhoi as $ch)
				      	@if($ctdt->idCauHoi==$ch->idCauHoi)
				      	<div @if($cau==1) style="display: block;"@endif class="slides panel panel-info">
					    	<div class="panel-heading"><p style="font-size: 20px;"><?php echo "Câu ".$cau." :"; ?></p>
					    		<?php echo $ch->NoiDung ?>
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
				      	@endforeach
			      	</div>
			      	<?php $dot=1; ?>
			      	<div style="width: 100%;text-align: center;">
			      	<?php
						foreach ($chitietdethi as $ctdt) {
							while ($dot <= $sotrang) {
								echo "<span style='color:red;cursor: pointer;margin-right:20px;' class='dots' idch='".$ctdt->idCauHoi."'>".$dot."</span>";
								$dot+=1;
								break;
							}
						}
						echo "<br>";
					?>
					</div>
			      <div style="width: 100%;text-align: center;margin-top: 20px;"><button class="btn btn-danger" type="submit">Nộp Bài Xem Kết Quả</button></div>
			      
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
		$(".dots").click(function(){
			var n=$(this).html();
			var slide=document.getElementsByClassName("slides");
			var dots=document.getElementsByClassName("dots");
			//if(n > slide.length){slideIndex=1;}
			//if(n<1){slideIndex=slide.length};
			for(var i=0;i<slide.length;i++){
				slide[i].style.display="none";
				dots[i].className=dots[i].className.replace(" active","");
			};
			slide[n-1].style.display="block";
			dots[n-1].className+=" active";
		});
	});
</script>
@endsection