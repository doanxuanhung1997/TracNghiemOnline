@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Them Tai Lieu
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
          <script type="text/javascript">
            alert("Them Tai Lieu Thanh Cong !!");
          </script>
        @endif
        @if(session('loi'))
          <div class="alert alert-danger">
            {{session('loi')}}
          </div>
        @endif
        <div>
          <form action="GiangVien/TaiLieu/ThemTaiLieu" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <span style="font-weight: bold;">Chon Mon Hoc : </span>
            <span>
              <select style="height: 30px;" id="ChonMonHoc" name="ChonMonHoc">
                @foreach($giangday as $gd)
                  @foreach($monhoc as $mh)
                    @if($gd->idMonHoc==$mh->idMonHoc)
                    <option value="{{$mh->idMonHoc}}">{{$mh->TenMonHoc}}</option>
                    @endif
                  @endforeach
                @endforeach
              </select>
            </span><br>
            <span>Ten tai Lieu :</span>
            <span><input type="text" class="form form-control" name="TenTaiLieu"></span><br>
            <span>Chon file:</span>
            <input type="file" class="form form-control"  name="urlFile"><br>
            <div style="width: 100%;text-align: center;">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </form>
        </div>
    		
    			
          <br><br>
    		  <div id="NoiDungDeThi" style="padding-left: 25px;padding-right: 25px;">
            
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
                $.get("GiangVien/Ajax/TaoDeThi/"+idMH,function(data){
                    $("#NoiDungDeThi").html(data);
                });
                //alert('a');
            });
        });
    </script>
@endsection