@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
      Chinh Sua Cau Hoi
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
        <form action="GiangVien/CauHoi/SuaCauHoi/{{$cauhoi->idCauHoi}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-sm-4">
              <span style="font-weight: bold;">Chon Mon Hoc : </span>
              <span>
                <select style="height: 30px;" id="ChonMonHoc" name="ChonMonHoc">
                  @foreach($giangday as $gd)
                    @foreach($monhoc as $mh)
                      @if($gd->idMonHoc==$mh->idMonHoc)
                      <option @if($cauhoi->idMonHoc==$mh->idMonHoc) {{"selected"}} @endif
                        value="{{$mh->idMonHoc}}">{{$mh->TenMonHoc}}
                      </option>
                       @endif
                    @endforeach
                  @endforeach
                </select>
              </span>
            </div>
            <div class="col-sm-4">
              <span style="font-weight: bold;">Chon Chu De : </span>
              <span>
                <select style="height: 30px;" id="ChonChuDe" name="ChonChuDe">
                  @foreach($chude as $cd)
                  <option @if($cauhoi->idChuDe==$cd->idChuDe) {{"selected"}} @endif
                    value="{{$cd->idChuDe}}">{{$cd->TenChuDe}}
                  </option>
                  @endforeach
                </select>
              </span>
            </div>
            <div class="col-sm-4">
              <span style="font-weight: bold;">Chon Level : </span>
              <span>
                <select style="height: 30px;" id="ChonLevel" name="ChonLevel">
                  @foreach($level as $l)
                  <option @if($cauhoi->idLevel==$l->idLevel) {{"selected"}} @endif
                  value="{{$l->idLevel}}">{{$l->NameLevel}}
                  </option>
                  @endforeach
                </select>
              </span>
            </div>
          </div>
          <div class="form-group">
                <label >Noi Dung:</label><br>
                <textarea  id="noidung"  class="form-control ckeditor" rows="3" name="txtNoiDung">{{$cauhoi->NoiDung}}</textarea>
            </div>
            <div class="form-group">
                <label >Hinh Anh:</label>
                @if($cauhoi->urlHinh != "")
                <img style="width: 200px;height: 150px;" src="Upload/CauHoi/{{$cauhoi->urlHinh}}">
                <br>
                <label >Thay Hinh Anh:</label>
                @endif
                <input type="file" name="urlHinh">
            </div>
            <div class="form-group">
                <label >Phuong An A:</label>
                <textarea  id="phuongana" class="form-control ckeditor" style="height: 50px;" name="txtPhuongAnA">{{$cauhoi->PhuongAnA}}</textarea>
            </div>
            <div class="form-group">
                <label >Phuong An B:</label>
                <textarea  id="phuonganb" name="txtPhuongAnB" class="form-control ckeditor" rows="1" name="txtTomTat">{{$cauhoi->PhuongAnB}}</textarea>
            </div>
            <div class="form-group">
                <label >Phuong An C:</label>
                <textarea  id="phuonganc" name="txtPhuongAnC" class="form-control ckeditor" rows="1" name="txtTomTat">{{$cauhoi->PhuongAnC}}</textarea>
            </div>
            <div class="form-group">
                <label >Phuong An D:</label>
                <textarea  id="phuongand" name="txtPhuongAnD" class="form-control ckeditor" rows="1" name="txtTomTat">{{$cauhoi->PhuongAnD}}</textarea>
            </div>
            <div>
              <label>Dap An:</label>
              <div class="row">
                <div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="A" @if($cauhoi->DapAn=='A') {{"checked"}} @endif> A</div>
                <div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="B" @if($cauhoi->DapAn=='B') {{"checked"}} @endif> B</div>
                <div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="C" @if($cauhoi->DapAn=='C') {{"checked"}} @endif> C</div>
                <div style="float: left;" class="col-sm-2"><input type="radio" name="dapan" value="D" @if($cauhoi->DapAn=='D') {{"checked"}} @endif> D</div>
              </div>
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
        });
    </script>
@endsection