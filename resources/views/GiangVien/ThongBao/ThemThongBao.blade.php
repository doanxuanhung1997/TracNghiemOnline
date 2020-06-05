@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Them Thong Bao
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
          <form action="GiangVien/ThongBao/ThemThongBao" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label >Tieu De:</label>
                <input type="text" class="form-control" name="txtTieuDe">
            </div>
            <div class="form-group">
                  <label >Noi Dung:</label><br>
                  <textarea  class="form-control ckeditor" rows="3" name="txtNoiDung"></textarea>
              </div>
           
            <div style="width: 100%;text-align: center;">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <br>
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