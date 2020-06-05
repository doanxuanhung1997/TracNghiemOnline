<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\monhoc;
use App\dethi;
use App\chitietdethi;
use App\cauhoi;
use App\giangday;
use App\bangdiem;
use App\tintuc;
use App\thongbao;
use App\users;
use Hash;
use DB;

class GiangVienController extends Controller
{
    function xemThongTin(Request $request){
        $monhoc=monhoc::all();
        $idUser=$request->session()->get('idUser');
        $users=users::where('id',$idUser)->first();
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
        return view('GiangVien.thongtin',compact('monhoc','giangday','idUser','users'));
    }
    public function postThongTin(Request $request,$id)
    {
        $users = users::find($id); //lấy tài khoản có id=... để sửa

         $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa; unique: kiểm tra tồn tại chưa)
            [
                'txtName' => 'required|min:6|max:30',
                'txtEmail' => 'required|min:10|max:50',
                'txtAddress' => 'required|max:100'
            ],
            // Xuất ra thông báo
            [

                'txtName.required'=>'Bạn chưa nhập Họ Tên',
                'txtName.min'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',
                'txtName.max'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',

                'txtEmail.required'=>'Bạn chưa nhập Email',
                'txtEmail.min'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',
                'txtEmail.max'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',

                'txtAddress.required'=>'Bạn chưa nhập Địa Chỉ',
                'txtAddress.max'=>'Độ dài Địa Chỉ dưới 100 ký tự'
            ]);
        // Tìm đối tượng Account để sửa
        $users =$users::find($id);
   
        $users->HoTen = $request->txtName;
        $users->NgaySinh = $request->birthday;
        $users->email = $request->txtEmail;
        $users->GioiTinh = $request->rdoSex;
        if($request->hasFile('fImages'))
        {
            $file=$request->file('fImages');
            //Kiểm tra đuôi file có phải file ảnh không ?
            if ($file->getClientOriginalExtension('fImages')=="jpg" || $file->getClientOriginalExtension('fImages')=="png" || $file->getClientOriginalExtension('fImages')=="jpeg") {

                $fileAvatar = $file->getClientOriginalName('fImages');
                $file->move("admin_asset/upload/images",$fileAvatar);//Lưu file ảnh mới vào foder
                //unlink("admin_asset/upload/images/".$users->urlHinh); //Xóa file ảnh cũ trong foder góc
                $users->urlHinh=$fileAvatar;
            }
        }
        $users->DiaChi = $request->txtAddress;
        //$users->idtype = $request->rdoLevel;

        $users->save(); //Lưu lại

        //trở lại trang sửa tài khoản với thông báo
        return redirect('GiangVien/thongtin/'.$id)->with('thongbao','Lưu lại thông tin thành công !!!');
    }

	//Đổi Mật Khẩu Admin
   	public function getDoiMatKhau(Request $request)
   	{
   		$monhoc=monhoc::all();
        $idUser=$request->session()->get('idUser');
        $users=users::where('id',$idUser)->first();
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
   		return view('GiangVien.doimatkhau',compact('monhoc','giangday','idUser'));
   	}

   	public function postDoiMatKhau($id, Request $request)
   	{
   		$users=users::find($id);
   	
   		if (Hash::check($request->passwordcu, $users->password))
		{
		    $users->password=bcrypt($request->passwordmoi1);
		    $users->save();
		    return redirect('GiangVien/doimatkhau')->with('thongbao','Đổi mật khẩu thành công');
		}
   		else
   			return redirect('GiangVien/doimatkhau')->with('thongbao','Mật khẩu cũ hiện tại không chính xác. Hãy thử lại');
   		
   	}
}
