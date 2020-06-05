<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cổng thi thử THPT Quốc Gia, thi thử trực tuyến miễn phí</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--   khai baos duong dan mac dinh -->
    <base href="{{asset('')}}">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- Hearder -->
    @include('thionline.layout.header')
   
    <div class="container">
        <!-- Page Content -->
        @yield('content')
    </div>
    <hr>
    <!-- footer nè -->
    @include('thionline.layout.footer')
    @yield('script')
</body>
</html>