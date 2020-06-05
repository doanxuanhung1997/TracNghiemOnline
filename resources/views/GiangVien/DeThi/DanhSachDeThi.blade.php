@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Ngân Hàng Đề Thi {{$monhoc->TenMonHoc}}
    </div>
    <div style="padding-left: 10px;">
    	<div style="margin-top: 10px;" class="row">
      @if(session('thongbaoxoa'))
        <div class="alert alert-success">
          {{session('thongbaoxoa')}}
        </div>
      @endif
      
    	<div class="row">
        
        <div class="col-sm-12">
                    <input id="searchDT" class="w3-input w3-border form form-control" type="text" placeholder="Enter Search">
                </div>
      </div>	
        
    	</div>
    	<div id="divSearch">
    	</div>
    </div>
    <div  id="DSDeThi" style="padding-left: 10px;margin-top: 15px;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã Đề Thi</th>
                        <th>Tên Đề Thi</th>
                        <th>Thời Gian</th>
                        <th>Ngày Tạo </th>
                        <th>Chi Tiet</th>
                        <th>Chinh Sua</th>
                        <th>Xoa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dethi as $dt) 
                    <tr>
                        <td>{{$dt->idDeThi}}</td>
                        <td><?php echo $dt->TenDeThi ?></td>
                        <td>{{$dt->ThoiGian}}</td>
                        <td>{{$dt->NgayDuocTao}}</td>
                        <td><a href='GiangVien/DeThi/ChiTietDeThi/{{$dt->idDeThi}}'><img class='icon chitiet' idcauhoi='{{$dt->idDeThi}}' src='images/iconct.jpg'></a></td>
                        <td><a href='GiangVien/DeThi/SuaDeThi/{{$dt->idDeThi}}'><img class='icon chinhsua' idcauhoi='{{$dt->idDeThi}}' src='images/iconchinhsua.jpg'></a></td>
                        <td><a href='GiangVien/DeThi/XoaDeThi/{{$dt->idDeThi}}'><img class='icon xoa' idcauhoi='{{$dt->idDeThi}}' src='images/icondel.jpg'></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="width: 100%;text-align: center;">{{$dethi->links()}}</div>
        </div>
  </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#monhocDT").change(function(){
                var idMH=$(this).val();
                $.get("GiangVien/Ajax/DSDeThi/"+idMH,function(data){
                    $("#DSDeThi").html(data);
                });
                //alert('a');
            });
            $("#searchDT").change(function() {
              var idDT=$(this).val();
              if(idDT != ""){
                $.get("GiangVien/Ajax/TimDeThi/"+idDT,function(data){
                    $("#divSearch").html(data);
                    $("#DSDeThi").hide();
                });
              }else{
                $("#DSDeThi").show();
                $("#divSearch").hide();
              }
                
            });
        });
    </script>
@endsection