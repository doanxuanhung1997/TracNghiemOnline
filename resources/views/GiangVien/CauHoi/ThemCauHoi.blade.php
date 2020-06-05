@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Them Cau Hoi
    </div>
    <div style="padding-left: 10px;">
    	<div style="margin-top: 10px;">
        @if(count($errors)>0)
          <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                {{$err}}<br>
              @endforeach
          </div>
          @endif
          @if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
          @endif
          @if(session('loi'))
              <div class="alert alert-danger">
                {{session('loi')}}
              </div>
          @endif
        
        <div class="row">
          <div id="taoCH" style="color: red;cursor: pointer;" class="col-sm-2">Tao Cau Hoi</div>
          <div id="importCH" style="color: red;cursor: pointer;" class="col-sm-2">Import File</div>
        </div>
        <br>
        <div id="importFile" style="display: none;">
          <form action="GiangVien/CauHoi/ImportFile" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="file" name="file">
            <p style="color: red">{{$errors->first('file')}}</p>
            <input type="submit" name="" class="btn btn-success" value="Import">
          </form>
        </div>
        <div id="formThemCauHoi" style="display: none;">
    		<form action="GiangVien/CauHoi/ThemCauHoi" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
    			<div class="row">
    				<div class="col-sm-3">
    					<span style="font-weight: bold;">Chon Mon Hoc : </span>
    					<span>
    						<select style="height: 30px;" id="ChonMonHoc" name="ChonMonHoc">
                  <option value="">Chọn môn học</option>
                  @foreach($giangday as $gd)
                    @foreach($monhoc as $mh)
                      @if($gd->idMonHoc==$mh->idMonHoc)
    							     <option value="{{$mh->idMonHoc}}">{{$mh->TenMonHoc}}</option>
                       @endif
                    @endforeach
    							@endforeach
    						</select>
    					</span>
    				</div>
    				<div class="col-sm-5">
              <span style="font-weight: bold;">Chon Chu De : </span>
              <span>
                <select style="height: 30px;" id="ChonChuDe" name="ChonChuDe">
                  @foreach($chude as $cd)
                  <option value="{{$cd->idChuDe}}">{{$cd->TenChuDe}}</option>
                  @endforeach
                </select>
              </span>
            </div>
            <div class="col-sm-2">
              <span style="font-weight: bold;">Chon Level : </span>
              <span>
                <select style="height: 30px;" id="ChonLevel" name="ChonLevel">
                  @foreach($level as $l)
                  <option value="{{$l->idLevel}}">{{$l->NameLevel}}</option>
                  @endforeach
                </select>
              </span>
            </div>
    			</div>
    			<div class="form-group">
          			<label >Noi Dung:</label><br>
          			<textarea  id="noidung"  class="form-control ckeditor" rows="3" name="txtNoiDung"></textarea>
        		</div>
        		<div class="form-group">
          			<label >Hinh Anh:</label>
          			<input type="file" name="urlHinh">
        		</div>
        		<div class="form-group">
          			<label >Phuong An A:</label>
          			<textarea  id="phuongana"  class="form-control ckeditor" style="height: 50px;" name="txtPhuongAnA"></textarea>
        		</div>
        		<div class="form-group">
          			<label >Phuong An B:</label>
          			<textarea  id="phuonganb"  name="txtPhuongAnB" class="form-control ckeditor" rows="1" name="txtTomTat"></textarea>
        		</div>
        		<div class="form-group">
          			<label >Phuong An C:</label>
          			<textarea  id="phuonganc"  name="txtPhuongAnC" class="form-control ckeditor" rows="1" name="txtTomTat"></textarea>
        		</div>
        		<div class="form-group">
          			<label >Phuong An D:</label>
          			<textarea  id="phuongand"  name="txtPhuongAnD" class="form-control ckeditor" rows="1" name="txtTomTat"></textarea>
        		</div>
        		<div>
        			<label>Dap An:</label>
        			<div class="row">
        				<div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="A" > A</div>
        				<div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="B" > B</div>
        				<div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="C" > C</div>
        				<div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="D" checked> D</div>
        			</div>
        		</div>
            <div class="form-group">
                <label >Chú Thích :</label><br>
                <textarea style="width: 90%;" name="txtChuThich"></textarea>
            </div>
        		<br>
        		<div style="width: 100%;text-align: center;">
        			<button type="submit" class="btn btn-success">Submit</button>
        		</div>
    		</form>
    		</div>
    	</div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#ChonMonHoc").change(function(){
                var idMH=$(this).val();
                $.get("GiangVien/Ajax/getChuDe/"+idMH,function(data){
                    $("#ChonChuDe").html(data);
                });
                //alert('a');
            });
            $("#taoCH").click(function(){
              $("#formThemCauHoi").show();
              $("#importFile").hide();
            });
            $("#importCH").click(function(){
              $("#formThemCauHoi").hide();
              $("#importFile").show();
            });
        });
    </script>
@endsection