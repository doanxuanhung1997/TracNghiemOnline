@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Danh Sach Tin Tuc
    </div>
    <div style="padding-left: 10px;">
        @if(session('thongbaoxoa'))
            <div class="alert alert-success">
                {{session('thongbaoxoa')}}
            </div>
        @endif
         <br>
            
    	<div id="DSTinTuc">
            <table class='table '>
                <thead>
                    <tr>
                      <th>Tieu De</th>
                      <th>Tom Tat</th>
                      <th>Ngay Tao</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tintuc as $tt)
                      <tr>
                          <td><?php echo $tt->TieuDe ?></td>
                          <td>{{$tt->TomTat}}</td>
                          <td>{{$tt->NgayTao}}</td>
                          <td>
                              <a href="GiangVien/TinTuc/ChiTietTin/{{$tt->idTinTuc}}" style="color: #DBA901"><button><span class="glyphicon glyphicon-hand-right"></span></button></a>
                              <a href="GiangVien/TinTuc/ChinhSuaTin/{{$tt->idTinTuc}}"><button><span class="glyphicon glyphicon-pencil"></span></button></a>
                              <a href="GiangVien/TinTuc/XoaTinTuc/{{$tt->idTinTuc}}" style="color: red"><button><span class="glyphicon glyphicon-trash"></span></button></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
            </table>
            <div style="width: 100%;text-align: center;">{{$tintuc->links()}}</div>
    	</div>
    </div>
  </div>
</div>
@endsection

@section('script')
    
@endsection