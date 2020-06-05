<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\users;
use Hash;

class AdminController extends Controller
{
  //Sua thông tin admin
   	public function xemThongTin($id)
   	{
        $users = users::find($id); //tìm tài khoản có admin
        return view('admin.thongtin',['users'=>$users]);
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
            }else{
                return redirect('admin/user/sua/'.$id)->with('thongbao','Hình đại diện không phải là file Ảnh (png,jpg,jpeg)');
            }
        }
        $users->DiaChi = $request->txtAddress;
        //$users->idtype = $request->rdoLevel;

        $users->save(); //Lưu lại

        //trở lại trang sửa tài khoản với thông báo
        return redirect('admin/thongtin/'.$id)->with('thongbao','Lưu lại thông tin thành công !!!');
    }

	//Đổi Mật Khẩu Admin
   	public function getDoiMatKhau()
   	{
   		return view('admin.doimatkhau');
   	}

   	public function postDoiMatKhau($id, Request $request)
   	{
   		$users=users::find($id);
   	
   		if (Hash::check($request->passwordcu, $users->password))
		{
		    $users->password=bcrypt($request->passwordmoi1);
		    $users->save();
		    return redirect('admin/doimatkhau')->with('thongbao','Đổi mật khẩu thành công');
		}
   		else
   			return redirect('admin/doimatkhau')->with('thongbao','Mật khẩu cũ hiện tại không chính xác. Hãy thử lại');
   		
   	}

}
