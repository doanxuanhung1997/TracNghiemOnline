@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Chi Tiet De Thi
    </div>
    <div style="padding-left: 10px;">
    	<div style="margin-top: 10px;">
    		<form>
    			<div class="row">
    				<div class="col-sm-4">
    					<span style="font-weight: bold;"> Mon Hoc : </span>
    					<span>
    						{{$monhoc->TenMonHoc}}
    					</span>
    				</div>
    				<div style="margin-top: 5px;" class="col-sm-4">
    					<span style="font-weight: bold;">Ten De Thi : </span>
    					<span>
    						{{$dethi->TenDeThi}}
    					</span>
    				</div>
            <div style="margin-top: 5px;" class="col-sm-4">
              <span style="font-weight: bold;">Thoi Gian Lam Bai : </span>
              <span>
                {{$dethi->ThoiGian}}
              </span>
            </div>
    			</div>
          <br>
          @foreach($ctdt as $ct)
          @foreach($cauhoi as $ch)
          @if($ct->idCauHoi==$ch->idCauHoi)
          <div class="panel panel-success">
            <div class="panel-heading"><span><?php echo $ch->NoiDung; ?></span>
              @if($ch->urlHinh !="")
              <div style="width: 100%;text-align: center;">
                <img style="width: 400px;height: 250px;" src="Upload/CauHoi/{{$ch->urlHinh}}">
              </div>
              @endif
            </div>
            <div class="panel-body">
              <div class="row">
              <div class="col-sm-6"><span>A : <?php echo $ch->PhuongAnA; ?></span></div>
              <div class="col-sm-6"><span>B : <?php echo $ch->PhuongAnB; ?></span></div>
              <div class="col-sm-6"><span>C : <?php echo $ch->PhuongAnC; ?></span></div>
              <div class="col-sm-6"><span>D : <?php echo $ch->PhuongAnD; ?></span></div>
            </div>
            </div>
          </div>
          @break
          @endif
          @endforeach
          @endforeach
    		</form>
    		
    	</div>
    </div>
  </div>
</div>
@endsection