@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
        <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    Ngân Hàng Câu Hỏi {{$monhoc->TenMonHoc}}
        </div>
        <div style="padding-left: 10px;">
            @if(session('thongbaoxoa'))
                <div class="alert alert-success">
                    {{session('thongbaoxoa')}}
                </div>
            @endif
             <br>
                <div class="row">
                    <div class="col-sm-12">
                        <input id="search" class="w3-input w3-border form form-control" type="text" placeholder="Enter Search">
                    </div>
                </div>
                
            <br>
            <div id="divSearch">
                
            </div>
        </div>
        <div  id="DSCauHoi" style="padding-left: 10px;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>idCauHoi</th>
                        <th>Noi Dung</th>
                        <th>Ngay Tao</th>
                        <th>Chi Tiet</th>
                        <th>Chinh Sua</th>
                        <th>Xoa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cauhoi as $ch) 
                    <tr>
                        <td>{{$ch->idCauHoi}}</td>
                        <td><?php echo $ch->NoiDung ?></td>
                        <td>{{$ch->NgayDuocTao}}</td>
                        <td><a href='GiangVien/CauHoi/ChiTietCauHoi/{{$ch->idCauHoi}}'><img class='icon chitiet' idcauhoi='{{$ch->idCauHoi}}' src='images/iconct.jpg'></a></td>
                        <td><a href='GiangVien/CauHoi/SuaCauHoi/{{$ch->idCauHoi}}'><img class='icon chinhsua' idcauhoi='{{$ch->idCauHoi}}' src='images/iconchinhsua.jpg'></a></td>
                        <td><a href='GiangVien/CauHoi/XoaCauHoi/{{$ch->idCauHoi}}'><img class='icon xoa' idcauhoi='{{$ch->idCauHoi}}' src='images/icondel.jpg'></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="width: 100%;text-align: center;">{{$cauhoi->links()}}</div>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#monhoc").change(function(){
                var idMH=$(this).val();
                $.get("GiangVien/Ajax/DSCauHoi/"+idMH,function(data){
                    $("#DSCauHoi").html(data);
                });
                
            });
            $("#search").change(function() {
              var idCH=$(this).val();
              if (idCH != "") {
                $.get("GiangVien/Ajax/TimCauHoi/"+idCH,function(data){
                    $("#DSCauHoi").hide();
                    $("#divSearch").html(data);
                });
              }else{
                $("#DSCauHoi").show();
                $("#divSearch").hide();
              }   
            });
        });
    </script>
@endsection