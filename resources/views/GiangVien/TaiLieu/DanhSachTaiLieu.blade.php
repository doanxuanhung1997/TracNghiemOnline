@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Ngan Hang Tai Lieu
    </div>
    <div style="padding-left: 10px;">
    	<div style="margin-top: 10px;" class="row">
      @if(session('thongbaoxoa'))
        <div class="alert alert-success">
          {{session('thongbaoxoa')}}
        </div>
      @endif
    	</div>
    	<div id="DSTaiLieu">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>idTaiLieu</th>
                        <th>Tên Tài Liệu</th>
                        <th>Loại Tài Liệu</th>
                        <th>Ngày Đăng</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tailieu as $tl) 
                    <tr>
                        <td>{{$tl->idTaiLieu}}</td>
                        <td><?php echo $tl->TenTaiLieu ?></td>
                        <td>{{$tl->Type}}</td>
                        <td>{{$tl->NgayDang}}</td>
                        
                        <td><a href="Upload/TaiLieu/{{$tl->urlFile}}" download="{{$tl->urlFile}}">
  <button type='button' class='btn btn-primary'>Download</button>
</a>
<a href='GiangVien/TaiLieu/XoaTaiLieu/{{$tl->idTaiLieu}}'><img class='icon xoa' src='images/icondel.jpg'></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="width: 100%;text-align: center;">{{$tailieu->links()}}</div>
    	</div>
     <!--  <div id="paginate" style="display: none;" class="row"></div> -->
    </div>
  </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#monhoc").change(function(){
                var idMH=$(this).val();
                $.get("GiangVien/Ajax/DSTaiLieu/"+idMH,function(data){
                  $("#DSTaiLieu").html(data);
                });
                
                //$("#paginate").css("display", "block");
                //$("#paginate").replaceWith( "bb" )
                //alert(idMH);
            });
        });
    </script>
@endsection