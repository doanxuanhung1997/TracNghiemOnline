<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monhoc;

class MonHocController extends Controller
{	
	//lấy danh sách môn học
    public function getDanhSach(){
    	$monhoc = monhoc::all();
    	return view('admin.monhoc.danhsach',['monhoc'=>$monhoc]);
    }

    public function getThem(){
    	return view('admin.monhoc.them'); //show page thêm
    }

    public function postThem(Request $request){
        //Validate form thêm môn học
        $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa)
            [
                'TenMonHoc' => 'required|unique:monhoc|max:30',
            ],
            // Xuất ra thông báo
            [
                'TenMonHoc.unique'=>'Tên môn học đã tồn tại',
                'TenMonHoc.required'=>'Bạn chưa nhập tên môn học',
                'TenMonHoc.max'=>'Độ dài tên môn học không được quá 30 kí tự',
            ]);
        // Tạo 1 đối tượng môn học
        $monhoc = new monhoc;
        
        $monhoc->TenMonHoc = $request->TenMonHoc;
     
        $monhoc->save(); //Lưu lại

        return redirect('admin/monhoc/them')->with('thongbao','Đã thêm môn học mới thành công');
    }

    public function getSua($id){

        $monhoc = monhoc::find($id); //tìm tài khoản có id=... để sửa
        return view('admin.monhoc.sua',['monhoc' =>$monhoc]);
    }

      public function postSua(Request $request,$id)
    {
        //Validate form thêm môn học
        $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa)
            [
                'TenMonHoc' => 'required|unique:monhoc',
            ],
            // Xuất ra thông báo
            [
                'TenMonHoc.unique'=>'Tên môn học đã tồn tại',
                'TenMonHoc.required'=>'Bạn chưa nhập tên môn học',
            ]);
        // Tìm đối tượng môn học
        $monhoc = monhoc::find($idMonHoc=$id);
        
        $monhoc->TenMonHoc = $request->TenMonHoc;
     
        $monhoc->save(); //Lưu lại

        return redirect('admin/monhoc/sua/'.$id)->with('thongbao','Đã chỉnh sửa môn học thành công');
    }

    public function getXoa($id)
    {
       	$monhoc = monhoc::find($idMonHoc=$id);  //Tìm id môn học để xóa
        $monhoc->delete();

        return redirect('admin/monhoc/danhsach');
    }
}
