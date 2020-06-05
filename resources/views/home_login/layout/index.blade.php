<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cổng thi thử THPT Quốc Gia, thi thử trực tuyến miễn phí</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--   khai baos duong dan mac dinh -->
    <base href="{{asset('')}}">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_home_login.css" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- Hearder -->
    @include('home_login.layout.header')
     <div class="container">
        <!-- Thanh cong cu -->
        <div class="row" >
            <div class="col-md-5 row_Img_cnt1"><img src="http://thithu24h.com/images/logo_matra2.png" alt="Logo thi thử 24h" style="width:50%;height:70px;"></div>
            <div class="col-md-2"><a href="#" class="row_cnt1">Tìm kiếm</a></div>
            <div class="col-md-2">
                @if($idUser!='')
                   <a href="HocVien/LichSuHocTap" class="row_cnt1" > Lich Su Hoc Tap</a>
                @else
                    <a class="row_cnt1" href="">Dang Nhap</a> 
                @endif
           </div>
            <div class="col-md-2"><a href="#" class="row_cnt1">@if($idUser!='')
                   Pham Minh Ke
                @else
                    Quen mat khau?
                @endif</a></div>
            <div class="col-md-1"><a href="#" class="row_cnt1">@if($idUser!='')
                    Thoat
                @else
                    Dang Ky
                @endif</a></div>
        </div>
        
        <!-- Page Content -->
        @yield('content')
    </div>
    <hr>
    <!-- footer nè -->
    @include('home_login.layout.footer')
    @yield('script')
</body>
</html>