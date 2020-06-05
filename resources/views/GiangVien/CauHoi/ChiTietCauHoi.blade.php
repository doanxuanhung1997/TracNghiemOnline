@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Chi Tiet Cau Hoi
    </div>
    <div style="padding-left: 10px;">
    	<div style="margin-top: 10px;">
    		<form>
    			<div class="row">
    				<div class="col-sm-4">
    					<span style="font-weight: bold;"> Mon Hoc : </span>
    					<span>
    						@foreach($monhoc as $mh)
                @if($cauhoi->idMonHoc==$mh->idMonHoc)
                {{$mh->TenMonHoc}}

                @endif
                @endforeach
    					</span>
    				</div>
    				<div style="margin-top: 5px;" class="col-sm-4">
    					<span style="font-weight: bold;">Chu De : </span>
    					<span>
    						@foreach($chude as $cd)
                @if($cauhoi->idChuDe==$cd->idChuDe)
                {{$cd->TenChuDe}}
                @endif
                @endforeach
    					</span>
    				</div>
            <div style="margin-top: 5px;" class="col-sm-4">
              <span style="font-weight: bold;">Level : </span>
              <span>
                @foreach($level as $l)
                @if($cauhoi->idLevel==$l->idLevel)
                {{$l->NameLevel}}
                @endif
                @endforeach
              </span>
            </div>
    			</div>
    			<div class="form-group">
          			<label >Noi Dung:</label><br>
          			<span><?php echo $cauhoi->NoiDung; ?></span>
        		</div>
        		<div class="form-group">
          			<label >Hinh Anh:</label>
          			<img style="width: 200px;height: 150px;" src="Upload/CauHoi/{{$cauhoi->urlHinh}}">
        		</div>
        		<div class="form-group">
          			<label >Phuong An A:</label>
          			<span><?php echo $cauhoi->PhuongAnA; ?></span>
        		</div>
        		<div class="form-group">
          			<label >Phuong An B:</label>
          			<span><?php echo $cauhoi->PhuongAnB; ?></span>
        		</div>
        		<div class="form-group">
          			<label >Phuong An C:</label>
          			<span><?php echo $cauhoi->PhuongAnC; ?></span>
        		</div>
        		<div class="form-group">
          			<label >Phuong An D:</label>
          			<span><?php echo $cauhoi->PhuongAnD; ?></span>
        		</div>
        		<div>
        			<label>Dap An:</label><span><span>{{$cauhoi->DapAn}}</span></span>
        		</div>
        		<br>
        		
    		</form>
    		
    	</div>
    </div>
  </div>
</div>
@endsection