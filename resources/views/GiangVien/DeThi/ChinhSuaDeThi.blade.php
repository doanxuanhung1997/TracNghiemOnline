@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
      Chinh Sua De Thi
    </div>
    @if(count($errors)>0)
      <div class="alert alert-danger">
      @foreach($errors->all() as $err)
      {{$err}}<br>
      @endforeach
      </div>
        @endif
        @if(session('thongbao'))
          <script type="text/javascript">
            alert("Chinh Sua De Thi Thanh Cong !!");
          </script>
        @endif
        @if(session('loi'))
          <div class="alert alert-danger">
            {{session('loi')}}
          </div>
        @endif
    <div style="padding-left: 10px;">
      <div style="margin-top: 10px;">
          <div class="row">
            <div class="col-sm-3">
              <span style="font-weight: bold;"> Mon Hoc : </span>
              <span>
                {{$monhoc->TenMonHoc}}
              </span>
            </div>
            <div class="col-sm-8">
              <form action="GiangVien/DeThi/ThayDoiTenThoiGianDeThi/{{$dethi->idDeThi}}" method='POST' enctype='multipart/form-data'>
              {{csrf_field()}}
              <div class="row">
                <div style="margin-top: 5px;" class="col-sm-12">
                  <span style="font-weight: bold;">Ten De Thi : </span>
                  <span>
                    <input class="form-control" type="text" name="TenDeThi" value="{{$dethi->TenDeThi}}">
                  </span>
                </div>
                <div style="margin-top: 5px;" class="col-sm-12">
                  <span style="font-weight: bold;">Thoi Gian Lam Bai : </span>
                  <span>
                    <input class="form-control" type="number" name="ThoiGian" value="{{$dethi->ThoiGian}}">   
                  </span>
                </div>
                <br>
                <div style="width: 100%;text-align: center;">
                  <button type="submit" class="btn btn-warning">Change</button>
                </div>
              </div>
            </form>
            </div>
            
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3" id='themcauhoi' style='cursor: pointer;color: #00FF00;' iddt='{{$dethi->idDeThi}}' >Them Cau Hoi Vao De Thi</div>
            <div class="col-sm-3" id='xoacauhoi' style='cursor: pointer;color: red;' iddt='{{$dethi->idDeThi}}' >Xoa Bo Cau Hoi Khoi De Thi</div>
          </div>
          
          <br>
          <div id="luachonthemcauhoi"></div>
          <div id="luachonxoacauhoi"></div>
          
        
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type='text/javascript'>
  $(document).ready(function(){
    $('#themcauhoi').click(function(){
      var idDT=$(this).attr('iddt');
      $('#luachonxoacauhoi').hide();
      $('#luachonthemcauhoi').show();
      $.get('GiangVien/Ajax/ThemCauHoiVaoDeThi/'+idDT,function(data){
        $('#luachonthemcauhoi').html(data);
      });
    });
    $('#xoacauhoi').click(function(){
      var idDT=$(this).attr('iddt');
      $('#luachonxoacauhoi').show();
      $('#luachonthemcauhoi').hide();
      $.get('GiangVien/Ajax/XoaCauHoiKhoiDeThi/'+idDT,function(data){
        $('#luachonxoacauhoi').html(data);
      });
    });
  });
</script>
@endsection