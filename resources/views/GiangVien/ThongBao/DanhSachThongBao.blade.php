@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <a href="GiangVien/ThongBao/ThemThongBao"><button style="float: left;"><span class="glyphicon glyphicon-plus"></span>Add New</button></a>
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Thong Bao
    </div>
    <div style="padding-left: 10px;">
    	<div style="margin-top: 10px;" class="row">
      @if(session('thongbaoxoa'))
        <div class="alert alert-success">
          {{session('thongbaoxoa')}}
        </div>
      @endif
    	</div>
      <style type="text/css">
        #thongbao th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
      </style>
    	<div id="DSThongBao">
        <table id="thongbao" class="table table-bordered">
          <thead>
            <th>Tieu De</th>
            <th>Nguoi Gui</th>
            <th>Thoi Gian</th>
          </thead>
          <tbody>
            @foreach($thongbao as $tb)
            <tr>
              <td><a class="ctthongbao" idThongBao="{{$tb->idThongBao}}">{{$tb->TieuDe}}</a></td>
              <td>{{$tb->idNguoiGui}}</td>
              <td>{{$tb->NgayDang}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div style="width: 100%;text-align: center;">{{$thongbao->links()}}</div>
    	</div>
     <!--  <div id="paginate" style="display: none;" class="row"></div> -->
     <div id="chitietthongbao">
       
     </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
        $(document).ready(function(){
            $(".ctthongbao").click(function(){
                var idTB=$(this).attr('idThongBao');
                $.get("GiangVien/Ajax/chitietthongbao/"+idTB,function(data){
                    $("#chitietthongbao").html(data);
                });
            });
        });
    </script>
@endsection