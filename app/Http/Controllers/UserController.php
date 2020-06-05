<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\users;

class UserController extends Controller
{
    public function getDanhSach(){

        if(Auth::check())
        {
            $users=users::where('idtype','!=',Auth::user()->idtype)->get();
            return view('admin.user.list',['users'=>$users]);
        }
        else
        {
            $users=users::all();
            return view('admin.user.list',['users'=>$users]);
        }
    }
    
    public function getThem(){
    	return view('admin.user.add');
    }

    public function postThem(Request $request){
        //Validate form tạo tài khoản
        $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa)
            [
                'txtUser' => 'required|unique:users,UserName|min:6|max:30',
                'txtPass' => 'required|min:6|max:21',
                'txtName' => 'required|min:6|max:30',
                'txtEmail' => 'required|min:10|max:50',
                'birthday' => 'required',
                'fImages' => 'required',
                'txtAddress' => 'required|max:100'
            ],
            // Xuất ra thông báo
            [
                'txtUser.unique'=>'Tên Tài Khoản đã tồn tại',
                'txtUser.required'=>'Bạn chưa nhập tên Tài Khoản',
                'txtUser.min'=>'Độ dài tên Tài Khoản nằm trong khoảng từ 6-30 ký tự',
                'txtUser.max'=>'Độ dài tên Tài Khoản nằm trong khoảng từ 6-30 ký tự',

                'txtPass.required'=>'Bạn chưa nhập Password',
                'txtPass.min'=>'Độ dài Password nằm trong khoảng từ 6-21 ký tự',
                'txtPass.max'=>'Độ dài Password nằm trong khoảng từ 6-21 ký tự',

                'txtName.required'=>'Bạn chưa nhập Họ Tên',
                'txtName.min'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',
                'txtName.max'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',

                'txtEmail.required'=>'Bạn chưa nhập Email',
                'txtEmail.min'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',
                'txtEmail.max'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',

                'birthday.required'=>'Bạn chưa chọn Ngày Sinh',

                'fImages.required'=>'Bạn chưa chọn Hinh đại diện',

                'txtAddress.required'=>'Bạn chưa nhập Địa Chỉ',
                'txtAddress.max'=>'Độ dài Địa Chỉ dưới 100 ký tự'
            ]);
        // Tạo 1 đối tượng Account
        $users = new users;
        
        $users->username = $request->txtUser;
        $users->HoTen = $request->txtName;
        $users->password =  bcrypt($request->txtPass);
        $users->NgaySinh = $request->birthday;
        $users->email = $request->txtEmail;
        $users->GioiTinh = $request->rdoSex;

        if($request->hasFile('fImages'))
        {
            $file=$request->file('fImages');
            //Kiểm tra đuôi file có phải file ảnh không ?
            if ($file->getClientOriginalExtension('fImages')=="jpg" || $file->getClientOriginalExtension('fImages')=="png" || $file->getClientOriginalExtension('fImages')=="jpeg") {

                $fileAvatar = $file->getClientOriginalName('fImages');
                $file->move("admin_asset/upload/images",$fileAvatar);
                $users->urlHinh=$fileAvatar;
            }else
            {
                return redirect('admin/user/them')->with('thongbao','Hình đại diện không phải là file Ảnh (png,jpg,jpeg)');
            }
        }
       
        $users->DiaChi = $request->txtAddress;
        $users->idtype = $request->rdoLevel;

        $users->save(); //Lưu lại

        return redirect('admin/user/them')->with('thongbao','Đã thêm Account thành công');
    }

    public function getSua($id){

        $users = users::find($id); //tìm tài khoản có id=... để sửa
        return view('admin.user.edit',['users'=>$users]);
    }

    public function postSua(Request $request,$id)
    {
        $users = users::find($id); //lấy tài khoản có id=... để sửa

         $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa; unique: kiểm tra tồn tại chưa)
            [
                'txtPass' => 'required|min:6',
                'txtName' => 'required|min:6|max:30',
                'txtEmail' => 'required|min:10|max:50',
                'txtAddress' => 'required|max:100'
            ],
            // Xuất ra thông báo
            [

                'txtPass.required'=>'Bạn chưa nhập Password',
                'txtPass.min'=>'Độ dài Password ít nhất 6 ký tự',
           

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
        $users->password = bcrypt($request->txtPass);
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
        $users->idtype = $request->rdoLevel;

        $users->save(); //Lưu lại

        //trở lại trang sửa tài khoản với thông báo
        return redirect('admin/user/sua/'.$id)->with('thongbao','Đã chỉnh sửa Account thành công');
    }

    public function getXoa($id)
    {
        $users = users::find($id);  //Tìm id tài khoản để xóa
        $users->delete();

         return redirect('admin/user/danhsach');
    }

}
