
<!DOCTYPE html>
<html>
<head>
	<title>WEBSITE TRAC NGHIEM TRUC TUYEN</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/giangvien.css')}}">
	<base href="{{asset('')}}">
</head>
<body>
<div id="bannertop">
	<span class="toggle-btn"><img id="hideshowmenu" src="{{asset('images/hideshowmenu.jpg')}}"></span>
	<span style="margin-left: 10px;"><img id="logo" src="{{asset('images/logo.jpg')}}"></span>
	<span>PMK STUDY</span>
</div>

<div>
	<div id="sidebar" style="height: auto;">
		<div style="width: 100%;text-align: center;margin-top: 25px;margin-bottom: 25px;">
			<img style="width: 100px;height: 100px;border-radius: 100%;" src="{{asset('images/admin.jpg')}}">
		</div>
		<a href=""><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/admin.jpg')}}"></span>Thong Tin Ca Nhan</div></a>
		<a href="GiangVien/CauHoi/DanhSachCauHoi"><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/qluser.jpg')}}"></span>Ngan Hang Cau Hoi</div></a>
		<a href="GiangVien/DeThi/DanhSachDeThi"><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/qlmonhoc.jpg')}}"></span>Ngan Hang De Thi</div></a>
		<a href="GiangVien/TaiLieu/DanhSachTaiLieu"><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/qlmonhoc.jpg')}}"></span>Quan Ly Tai Lieu</div></a>
		<a href="GiangVien/TinTuc/DanhSachTinTuc"><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/qlgiangvien.jpg')}}"></span>Quan Ly Tin Tức</div></a>
		<a href="GiangVien/ThongBao/DanhSachThongBao"><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/thongbao.jpg')}}"></span>Thong Bao</div></a>
		<a href=""><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/doimatkhau.jpg')}}"></span>Doi Mat Khau</div></a>
		<a href=""><div class="listmenu"><span><img class="iconmenu" src="{{asset('images/dangsuat.jpg')}}"></span>LogOut</div></a>

	</div>
	<div id="screenmain" style="padding-left: 10px;padding-bottom: 20px;">
		@yield('noidung')
	</div>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('.toggle-btn').click(function(){
				var lt=$('#sidebar').css('left');
				if(lt=== '0px'){
					$('#sidebar').css("left","-200px");
					$('#screenmain').css("left","0px");
					$('#screenmain').css("width","100%");
				}
				else {
					$('#sidebar').css("left","0px");
					$('#screenmain').css("left","200px");
					$('#screenmain').css("width","85%");
			}
			});
		});
	</script>
	<!-- nhung trinh soan thao -->
    <script type="text/javascript" language="javascript" src="GiangVien/ckeditor/ckeditor.js" ></script>
    
    @yield('script')
</body>
</html>