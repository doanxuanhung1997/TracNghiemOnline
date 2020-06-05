@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">
    <div style="text-align: center; height: 40px; border-bottom: 2px solid #BDBDBD;line-height: 40px;font-weight: bold;font-size: 20px;">
    	Them Tin Tuc
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
    		<form action="GiangVien/TinTuc/ThemTinTuc" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
    			<div class="form-group">
                <label >Tieu De:</label>
                <input type="text" class="form-control" name="txtTieuDe">
            </div>
            <div class="form-group">
                <label >Tom Tat:</label>
                <input type="text" class="form-control" name="txtTomTat">
            </div>
    			<div class="form-group">
          			<label >Noi Dung:</label><br>
          			<textarea  class="form-control ckeditor" rows="3" name="txtNoiDung"></textarea>
        		</div>
        		<div class="form-group">
          			<label >Hinh Anh:</label>
          			<input type="file" name="urlHinh">
        		</div>
        		
        		<div style="width: 100%;text-align: center;">
        			<button type="submit" class="btn btn-success">Submit</button>
        		</div>
            <br>
    		</form>
    		
    	</div>
    </div>
  </div>
</div>
@endsection

@section('script')
@endsection