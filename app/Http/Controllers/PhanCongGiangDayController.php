<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\giangday;
use App\monhoc;
use App\users;

class PhanCongGiangDayController extends Controller
{
     //lấy dánh sách phân công
    public function getDanhSach(){
    	$giangday=giangday::all();
    	return view('admin.phancong.danhsachphancong',['giangday'=>$giangday]); //trả về page danhsachphancong với 1 đối tượng giangday
    }
    //gọi view tạo phân công mới
    public function getThem(){
    	$monhoc=monhoc::all(); //để lấy danh sách môn học show lên cobobox môn học
    	$giangvien=DB::table('users')->where('idtype',2)->get(); //để lấy danh sách giảng viên show lên cobobox giảng viên
    	return view('admin.phancong.taophancong',['monhoc'=>$monhoc,'giangvien'=>$giangvien]); //show page thêm
    }
    //xử lý Post tạo phân công mới
    public function postThem(Request $request){
      	
    	$giangday=giangday::all();
    	//Kiểm tra phân công giảng dạy đó đã tồn tại chưa.
      	foreach ($giangday as $key) {
      		if($key->idGiangVienHT == $request->GiangVien && $key->idMonHoc == $request->MonHoc)//Nếu tồn tại
      		{	
      			//Trả về lại trang tạo phân công với thông báo
      			return redirect('admin/phancong/them')->with('thongbao','Phân công giảng dạy đó đã tồn tại');
      		}
      	}
        // Tạo 1 đối tượng môn học
        $giangday = new giangday;
        
        $giangday->idGiangVienHT = $request->GiangVien;
        $giangday->idMonHoc = $request->MonHoc;
     
        $giangday->save(); //Lưu lại

        return redirect('admin/phancong/them')->with('thongbao','Phân công giảng dạy mới tạo thành công');
    }
    //Xóa phân công đã chọn
    public function getXoa($idGV, $idMH)
    {	
    	DB::table('giangday')->where('idGiangVienHT',$idGV)->where('idMonHoc',$idMH)->delete();
        return redirect('admin/phancong/danhsach');
        
    }

    public function getSua($idGV, $idMH){

    	$monhoc=monhoc::all(); //để lấy danh sách môn học show lên cobobox môn học
    	$giangvien=DB::table('users')->where('idtype',2)->get(); //để lấy danh sách giảng viên show lên cobobox giảng viên
  
    	$giangday=giangday::all();
    	foreach ($giangday as $key) {
    		if($key->idGiangVienHT == $idGV && $key->idMonHoc == $idMH)
    		{
    			$phancong= new giangday;
    			$phancong=$key;
    			break;
    		}
    	}
    	return view('admin.phancong.suaphancong',['monhoc'=>$monhoc,'giangvien'=>$giangvien,'phancong'=>$phancong]); //show page thay đổi (sửa) phân công
    }

    public function postSua(Request $request,$idGV, $idMH)
    {
        $giangday=giangday::all();
    	//Kiểm tra phân công giảng dạy Request gửi lên đã tồn tại chưa.
      	foreach ($giangday as $key) 
      	{
      		//Nếu tồn tại
      		if($key->idGiangVienHT == $request->GiangVien && $key->idMonHoc == $request->MonHoc)
      		{	
      			//Trả về lại trang tạo phân công với thông báo
    			$phancong= new giangday;
    			$phancong=$key;
    			return redirect('admin/phancong/sua/'.$phancong->idGiangVienHT.'&'.$phancong->idMonHoc)->with('thongbao','Phân công giảng dạy đó đã tồn tại');
    		  }
      	}
        
        DB::table('giangday')->where('idGiangVienHT',$idGV)->where('idMonHoc',$idMH)->delete();
        $giangday = new giangday;
        
        $giangday->idGiangVienHT = $request->GiangVien;
        $giangday->idMonHoc = $request->MonHoc;
     
        $giangday->save(); //Lưu lại
        return redirect('admin/phancong/sua/'.$giangday->idGiangVienHT.'&'.$giangday->idMonHoc)->with('thongbao','Đã chỉnh sửa phân công giảng dạy thành công');
    }
   
}
