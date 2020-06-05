<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monhoc;
use App\giangday;
use App\tailieu;
class TaiLieuController extends Controller
{
    
    // public function getDanhSach(Request $request){
    // 	$monhoc=MonHoc::all();
    //     $idUser=$request->session()->get('idUser');
    //     $giangday=GiangDay::where('idGiangVienHT',$idUser)->get();
    //     return view('GiangVien.TaiLieu.DanhSachTaiLieu',compact('monhoc','giangday','idUser'));
    // }
    public function getDanhSach(Request $request,$idMH){
        $idUser=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
        $tailieu=tailieu::where([
              ['idMonHoc','=',$idMH],
              ['idGiangVien','=',$idUser],
            ])->paginate(5);
        $monhoc=monhoc::where('idMonHoc',$idMH)->first();
        return view('GiangVien.TaiLieu.DanhSachTaiLieu',compact('monhoc','tailieu','giangday','idUser'));
    }
    public function getXoaTaiLieu(Request $request,$idTL){
    	$id=$request->session()->get('idUser');
        $tailieu=tailieu::find($idTL);
        //$dethi->TrangThai=0;
        $tailieu->delete();
        return redirect('GiangVien/TaiLieu/DanhSachTaiLieu')->with('thongbaoxoa','Xoa thanh cong');
    }
    public function getThemTaiLieu(Request $request){
    	$monhoc=monhoc::all();
        $idUser=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
        return view('GiangVien.TaiLieu.ThemTaiLieu',compact('monhoc','giangday','idUser'));
    }
    public function postThemTaiLieu(Request $request){
    	$tailieu=new tailieu;
    	$tailieu->idMonHoc=$request->ChonMonHoc;
    	$tailieu->idGiangVien=$request->session()->get('idUser');
    	$ldate = date('Y-m-d');
    	$tailieu->NgayDang=$ldate;
    	$this->validate($request,[
    		'TenTaiLieu'=>'required|unique:TaiLieu,TenTaiLieu|min:5|max:50'
    		],[
    			'TenTaiLieu.required'=>'Ban chua nhap ten tai lieu!!',
    			'TenTaiLieu.unique'=>'Ten Tai Lieu Da Ton Tai',
    			'TenTaiLieu.min'=>'Min 5 Ky Tu!!!',
    			'TenTaiLieu.max'=>'Max 50 Ky Tu!!!',

    			]);
    	if($request->hasFile('urlFile')){
    		$file=$request->file('urlFile');
    		$duoi=$file->getClientOriginalExtension();
    		// if($duoi !='jpg' && $duoi !='png'){
    		// 	return redirect('GiangVien/CauHoi/ThemCauHoi')->with('loi',"Chi upload file jpg hoac png");
    		// }
    		$name=$file->getClientOriginalName();
    		$newname=str_random(4)."_".$name;
    		while (file_exists("Upload/CauHoi/".$newname)) {
    		$newname=str_random(4)."_".$name;
    		}
    		$file->move("Upload/TaiLieu",$newname);
    		$tailieu->urlFile=$newname;
    		$tailieu->TenTaiLieu=$request->TenTaiLieu;
    		$tailieu->Type=$duoi;
    		$tailieu->save();
    	}
    	return redirect('GiangVien/TaiLieu/ThemTaiLieu')->with('thongbao',"Them tai Lieu Thanh Cong");
    }
}
