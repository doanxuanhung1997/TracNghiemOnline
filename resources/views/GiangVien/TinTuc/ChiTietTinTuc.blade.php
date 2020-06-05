@extends('GiangVien.layout.index')
@section('noidung')
<div id="page-wrapper">
    <div class="container-fluid">

    <div style="padding-left: 10px;">
      <div class="row">
        <div class="col-sm-8">
          <div style="margin-top: 10px;padding-left: 50px;" class="panel panel-default">
            <h3><?php echo $tintuc->TieuDe ?></h3>
            <div><?php echo $tintuc->TomTat ?></div>
            <img style="width: 500px;height: 400px;" src="Upload/TinTuc/<?php echo $tintuc->urlHinh ?>">
            <div><?php echo $tintuc->NoiDung ?></div>
          </div>
        </div>

        <div class="col-sm-3">
          <div style="margin-top: 10px;" class="panel panel-default">
            <div class="panel-heading">Tin Lien Quan</div>
            <div class="panel-body">
              @foreach($tinkhac as $tk)
              <a href="GiangVien/TinTuc/ChiTietTin/{{$tk->idTinTuc}}"><?php echo $tk->TieuDe ?></a><br>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection