<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index','MyController@index');
// SESSION
Route::group(['middleware' => ['web']],function(){
	Route::get('Session',function(){
		Session::put('idUser','2');
		echo "2222";
	});
});
// ROUTE GIANG VIEN
Route::group(['prefix'=>'GiangVien'],function(){
	Route::get('index','MyController@getIndex');
	Route::get('thongtin/{id}','GiangVienController@xemThongTin');
	Route::get('doimatkhau','GiangVienController@getDoiMatKhau');

    Route::post('doimatkhau/{id}','GiangVienController@postDoiMatKhau');
    Route::post('thongtin/{id}','GiangVienController@postThongTin');
	Route::group(['prefix'=>'CauHoi'],function(){
		//Route::get('DanhSachCauHoi','CauHoiController@getDanhSach');
		Route::get('DanhSachCauHoi/{idMH}','CauHoiController@getDanhSach');
		Route::get('ChiTietCauHoi/{idCH}','CauHoiController@getChiTietCauHoi');

		Route::get('SuaCauHoi/{id}','CauHoiController@getSuaCauHoi');
		Route::post('SuaCauHoi/{id}','CauHoiController@postSuaCauHoi');//->name('CategoryEdit');

		Route::get('ThemCauHoi','CauHoiController@getThemCauHoi');
		Route::post('ThemCauHoi','CauHoiController@postThemCauHoi');
		Route::post('ImportFile','CauHoiController@postImportFile');

		Route::get('XoaCauHoi/{idCH}','CauHoiController@getXoaCauHoi');
	});
	Route::group(['prefix'=>'DeThi'],function(){
		
		//Route::get('DanhSachDeThi','DeThiController@getDanhSach');
		Route::get('DanhSachDeThi/{idMH}','DeThiController@getDanhSach');
		Route::get('ChiTietDeThi/{idDT}','DeThiController@getChiTietDeThi');

		Route::get('SuaDeThi/{idDT}','DeThiController@getChinhSuaDeThi');
		Route::post('SuaDeThi/{idDT}','DeThiController@postSuaDeThi');//->name('CategoryEdit');

		Route::get('ThemDeThi','DeThiController@getThemDeThi');
		Route::post('ThemDeThi','DeThiController@postThemDeThi');
		Route::post('TuyChonCauHoi','DeThiController@postTuyChonCauHoi');
		Route::post('ThemCauHoiVaoDeThi','DeThiController@postThemCauHoiVaoDeThi');
		Route::post('ThayDoiTenThoiGianDeThi/{idDT}','DeThiController@postThayDoiTenThoiGianDeThi');
		Route::post('XoaCauHoiKhoiDeThi/{idDT}','DeThiController@postXoaCauHoiKhoiDeThi');

		Route::get('XoaDeThi/{idDT}','DeThiController@getXoaDeThi');
	});
	Route::group(['prefix'=>'TinTuc'],function(){
		Route::get('DanhSachTinTuc','TinTucController@getDanhSach');
		Route::get('ChiTietTin/{idTin}','TinTucController@getChiTietTin');
		Route::get('ChinhSuaTin/{idTin}','TinTucController@getChinhSuaTin');
		Route::post('ChinhSuaTin/{idTin}','TinTucController@postChinhSuaTin');
		Route::get('ThemTinTuc','TinTucController@getThemTin');
		Route::post('ThemTinTuc','TinTucController@postThemTin');
		Route::get('XoaTinTuc/{idTT}','TinTucController@getXoaTinTuc');
	});
	Route::group(['prefix'=>'TaiLieu'],function(){
		Route::get('DanhSachTaiLieu/{idMH}','TaiLieuController@getDanhSach');
		Route::get('ThemTaiLieu','TaiLieuController@getThemTaiLieu');
		Route::post('ThemTaiLieu','TaiLieuController@postThemTaiLieu');
		Route::get('XoaTaiLieu/{idTL}','TaiLieuController@getXoaTaiLieu');
	});
	Route::group(['prefix'=>'ThongBao'],function(){
		Route::get('DanhSachThongBao','ThongBaoController@getDanhSach');
		Route::get('ThemThongBao','ThongBaoController@getThemTB');
		Route::post('ThemThongBao','ThongBaoController@postThemTB');
	});
	Route::group(['prefix'=>'Ajax'],function(){

		Route::get('DSCauHoi/{idMH}','AjaxController@getDanhSachCauHoi');
		Route::get('chitietthongbao/{idTB}','AjaxController@getChiTietThongBao');
		Route::get('TimCauHoi/{idCH}','AjaxController@getTimCauHoi');
		Route::get('TimDeThi/{idDT}','AjaxController@getTimDeThi');
		Route::get('DSDeThi/{idMH}','AjaxController@getDanhSachDeThi');
		Route::get('DSTaiLieu/{idMH}','AjaxController@getDanhSachTaiLieu');

		Route::get('getChuDe/{idMH}','AjaxController@getChuDeTheoMonHoc');
		Route::get('TaoDeThi/{idMH}','AjaxController@getFormTaoDeThi');
		Route::get('TuyChonCauHoi/{idMH}','AjaxController@getTuyChonCauHoi');
		Route::get('ThemCauHoiVaoDeThi/{idDT}','AjaxController@getThemCauHoiVaoDeThi');
		Route::get('XoaCauHoiKhoiDeThi/{idDT}','AjaxController@getXoaCauHoiKhoiDeThi');
	});
});
Route::group(['prefix'=>'HocVien'],function(){
	Route::get('LamBaiThi/{idDT}','MyController@LamBaiThi');
	Route::get('DoTest/{idDT}','MyController@getDoTest');
	Route::post('NopBaiThi/{idDT}','MyController@NopBaiThi');
	Route::get('LichSuHocTap','MyController@getLichSuHocTap');
	Route::get('Ajax/CauHoiTrongDeThi/{id}','MyController@getAjaxCauhoi');
	Route::get('Ajax/CauHoiTrongDeThi2/{idCH}','MyController@getAjaxCauhoi2');
});


// Danh nhap.
Route::get('danhsachdethi/{id}','MyController@DanhSachDeThi');
Route::post('danhsachdethi','MyController@postDanhSachDeThi');


Route::get('xemtin/{id}','MyController@xemTinTuc');
Route::get('tailieu','MyController@getTaiLieu');
Route::get('xemthongbao/{id}','MyController@xemThongBao');


Route::get('trangchu','MyController@loadTrangChu');

Route::get('dangnhap','MyController@loadDangNhap');
Route::get('dangky','MyController@loadDangKy');
Route::post('dangky','MyController@SVDangKy');


Route::post('login','MyController@login');
Route::get('logout','MyController@logout');



//Sinh viên

//đổi mật khẩu
Route::get('svdoimatkhau','MyController@getDoiMatKhau');
Route::post('svdoimatkhau/{id}','MyController@postDoiMatKhau');

//Xem thoong tin sinh viên và chỉnh sửa
Route::get('thongtinsv','MyController@xemThongTin');

Route::post('thongtinsv/{id}','MyController@postThongTin');


// Quan Ly cua Admin.
Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'user'], function() {
        //admin/user/danhsach
        Route::get('danhsach','UserController@getDanhSach');
        //admin/user/sua/{id}
        Route::get('sua/{id}','UserController@getSua');

        Route::post('sua/{id}','UserController@postSua');
        //admin/user/them
        Route::get('them','UserController@getThem');

        Route::post('them','UserController@postThem');

        Route::get('xoa/{id}','UserController@getXoa');
    });

    Route::group(['prefix' => 'monhoc'], function() {
        //admin/monhoc/...
        Route::get('danhsach','MonHocController@getDanhSach');

        Route::get('sua/{id}','MonHocController@getSua');

        Route::post('sua/{id}','MonHocController@postSua');

        Route::get('them','MonHocController@getThem');

        Route::post('them','MonHocController@postThem');

        Route::get('xoa/{id}','MonHocController@getXoa');
    });

    Route::group(['prefix' => 'chude'], function() {
        //admin/chude/...
        Route::get('danhsach','ChuDeController@getDanhSach');

        Route::get('sua/{id}','ChuDeController@getSua');

        Route::post('sua/{id}','ChuDeController@postSua');

        Route::get('them','ChuDeController@getThem');

        Route::post('them','ChuDeController@postThem');

        Route::get('xoa/{id}','ChuDeController@getXoa');
    });

    Route::group(['prefix' => 'phancong'], function() {
        //admin/phancong/...
        Route::get('danhsach','PhanCongGiangDayController@getDanhSach');

        Route::get('sua/{idGV}&{idMH}','PhanCongGiangDayController@getSua');

        Route::post('sua/{idGV}&{idMH}','PhanCongGiangDayController@postSua');

        Route::get('them','PhanCongGiangDayController@getThem');

        Route::post('them','PhanCongGiangDayController@postThem');

        Route::get('xoa/{idGV}&{idMH}','PhanCongGiangDayController@getXoa');
    });

    Route::get('doimatkhau','AdminController@getDoiMatKhau');

    Route::post('doimatkhau/{id}','AdminController@postDoiMatKhau');

    Route::get('thongtin/{id}','AdminController@xemThongTin');

    Route::post('thongtin/{id}','AdminController@postThongTin');
});