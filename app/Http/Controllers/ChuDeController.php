<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chude;
use App\monhoc;

class ChuDeController extends Controller
{
    //lấy dánh sách chủ đề
    public function getDanhSach(){
    	$chude = chude::all();
    	return view('admin.chude.danhsachchude',['chude'=>$chude]); //trả về page danhsachchude với 1 đối tượng chude
    }

    public function getThem(){
    	$monhoc=monhoc::all(); //để lấy danh sách môn học show lên cobobox môn học
    	return view('admin.chude.themchude',['monhoc'=>$monhoc]); //show page thêm
    }

    public function postThem(Request $request){
        //Validate form thêm chử đề
        $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa)
            [
                'TenChuDe' => 'required|unique:chude|max:100',
            ],
            // Xuất ra thông báo
            [
                'TenChuDe.unique'=>'Tên môn học đã tồn tại',
                'TenChuDe.required'=>'Bạn chưa nhập tên môn học',
                'TenChuDe.max'=>'Độ dài tên môn học không được quá 100 kí tự',
            ]);
        // Tạo 1 đối tượng môn học
        $chude = new chude;
        
        $chude->TenChuDe = $request->TenChuDe;
        $chude->idMonHoc = $request->MonHoc;
     
        $chude->save(); //Lưu lại

        return redirect('admin/chude/them')->with('thongbao','Đã thêm chủ đề mới thành công');
    }

    public function getSua($id){
    	$chude = chude::find($id); //tìm chủ đề có idChuDe = id . show thông tin ra page sửa
    	$monhoc = monhoc::all(); //để lấy danh sách môn học show lên cobobox môn học
    	return view('admin.chude.suachude',['chude'=>$chude,'monhoc'=>$monhoc]); //show page sửa chủ đề
    }

    public function postSua(Request $request,$id)
    {
         //Validate form thêm chử đề
        $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa)
            [
                'TenChuDe' => 'required|max:100',
            ],
            // Xuất ra thông báo
            [
                'TenChuDe.required'=>'Bạn chưa nhập tên môn học',
                'TenChuDe.max'=>'Độ dài tên môn học không được quá 100 kí tự',
            ]);
        
        $chude =chude::find($id);
        
        $chude->TenChuDe = $request->TenChuDe;
        $chude->idMonHoc = $request->MonHoc;
     
        $chude->save(); //Lưu lại

        return redirect('admin/chude/sua/'.$id)->with('thongbao','Đã chỉnh sửa chủ đề thành công');
    }

    public function getXoa($id)
    {
       	$chude = chude::find($idChuDe=$id);  //Tìm id chủ đề để xóa
        $chude->delete();

        return redirect('admin/chude/danhsach');
    }
}


