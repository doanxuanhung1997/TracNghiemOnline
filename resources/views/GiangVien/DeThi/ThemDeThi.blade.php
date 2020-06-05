@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Them De Thi
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
            alert("Them De Thi Thanh Cong !!");
          </script>
        @endif
        @if(session('loi'))
          <div class="alert alert-danger">
            {{session('loi')}}
          </div>
        @endif
    		
    			<div class="row">
    				<div class="col-sm-6" style="text-align: center;">
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