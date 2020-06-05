<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\monhoc;
use App\chude;
use App\level;
use App\giangday;
use App\cauhoi;

class CauHoiController extends Controller
{
    // public function getDanhSach(Request $request){
    // 	$monhoc=MonHoc::all();
    //     $idUser=$request->session()->get('idUser');
    //     $giangday=GiangDay::where('idGiangVienHT',$idUser)->get();
    //     return view('GiangVien.CauHoi.DanhSachCauHoi',compact('monhoc','giangday','idUser'));
    // }
    public function getDanhSach(Request $request,$idMH){
        $idUser=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
        $cauhoi=cauhoi::where([
              ['idMonHoc','=',$idMH],
              ['idNguoiTao','=',$idUser],
              ['TrangThai','=',1],
            ])->paginate(6);
        $monhoc=monhoc::where('idMonHoc',$idMH)->first();
        return view('GiangVien.CauHoi.DanhSachCauHoi',compact('monhoc','cauhoi','giangday','idUser'));
    }
    public function getThemCauHoi(Request $request){
    	$idUser=$request->session()->get('idUser');
    	$monhoc=monhoc::all();
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
    	$level=level::all();
    	$chude=chude::all();
    	return view('GiangVien.CauHoi.ThemCauHoi',compact('monhoc','giangday','level','chude'));
    }
    public function postThemCauHoi(Request $request){

    	$this->validate($request,[
    		'ChonMonHoc'=>'required',
    		'ChonChuDe'=>'required',
    		'ChonLevel'=>'required',
            'txtNoiDung'=>'required|min:5',
    		'txtChuThich'=>'required|min:5',
    		'txtPhuongAnA'=>'required|min:1',
    		'txtPhuongAnB'=>'required|min:1',
    		'txtPhuongAnC'=>'required|min:1',
    		'txtPhuongAnD'=>'required|min:1',
    	],[
    		'ChonMonHoc.required'=>'Ban Chua Chon Loai Tin',
    		'ChonChuDe.required'=>'Ban Chua Chon Chu De',
    		'ChonLevel.required'=>'Ban Chua Chon Level',
    		'txtNoiDung.required'=>'Ban Chua Nhap Noi Dung',
            'txtNoiDung.min'=>'Noi Dung phai co it nhat 5 ky tu',
    		'txtChuThich.min'=>'Noi Dung phai co it nhat 5 ky tu',
    		'txtPhuongAnA.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnA.min'=>'Noi Dung phai co it nhat 1 ky tu',
    		'txtPhuongAnB.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnB.min'=>'Noi Dung phai co it nhat 1 ky tu',
    		'txtPhuongAnC.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnC.min'=>'Noi Dung phai co it nhat 1 ky tu',
    		'txtPhuongAnD.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnD.min'=>'Noi Dung phai co it nhat 1 ky tu',
    	]);
    	$cauhoi=new cauhoi;
    	$cauhoi->idMonHoc=$request->ChonMonHoc;
    	$cauhoi->idChuDe=$request->ChonChuDe;
    	$cauhoi->idLevel=$request->ChonLevel;
        $cauhoi->NoiDung=$request->txtNoiDung;
    	$cauhoi->ChuThich=$request->txtChuThich;
    	$cauhoi->PhuongAnA=$request->txtPhuongAnA;
    	$cauhoi->PhuongAnB=$request->txtPhuongAnB;
    	$cauhoi->PhuongAnC=$request->txtPhuongAnC;
    	$cauhoi->PhuongAnD=$request->txtPhuongAnD;
    	$cauhoi->DapAn=$request->dapan;
    	$cauhoi->TrangThai=1;
    	$cauhoi->idNguoiTao=$request->session()->get('idUser');
    	$ldate = date('Y-m-d');
    	$cauhoi->NgayDuocTao=$ldate;

    	if($request->hasFile('urlHinh')){
    		$file=$request->file('urlHinh');
    		$duoi=$file->getClientOriginalExtension();
    		if($duoi !='jpg' && $duoi !='png'){
    			return redirect('GiangVien/CauHoi/ThemCauHoi')->with('loi',"Chi upload file jpg hoac png");
    		}
    		$name=$file->getClientOriginalName();
    		$newname=str_random(4)."_".$name;
    		while (file_exists("Upload/CauHoi/".$newname)) {
    			$newname=str_random(4)."_".$name;
    		}
    		$file->move("Upload/CauHoi",$newname);
    		$cauhoi->urlHinh=$newname;
    	}else{
    		$cauhoi->urlHinh="";
    	}
    	$cauhoi->save();
    	return redirect('GiangVien/CauHoi/ThemCauHoi')->with('thongbao',"Tham Cau Hoi Thanh Cong");
    }
    public function postImportFile(Request $request){
        $this->validate($request,[
            'file'=>'required|mimes:csv,txt'
        ]);
        if(($handle=fopen($_FILES['file']['tmp_name'],"r"))!==FALSE){
            fgetcsv($handle); //remove first row of excel file such as product
            while (($data=fgetcsv($handle,1000,","))!==FALSE) {
                $addCH=DB::table('cauhoi')->insert([
                    'idMonHoc'=>$data[0],
                    'idLevel'=>$data[1],
                    'idChuDe'=>$data[2],
                    'NoiDung'=>$data[3],
                    'PhuongAnA'=>$data[4],
                    'PhuongAnB'=>$data[5],
                    'PhuongAnC'=>$data[6],
                    'PhuongAnD'=>$data[7],
                    'DapAn'=>$data[8],
                    'urlHinh'=>$data[9],
                    'ChuThich'=>$data[10],
                    'TrangThai'=>1,
                    'NgayDuocTao'=>date('Y-m-d'),
                    'idNguoiTao'=>session()->get('idUser'),
                    'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                ]);
            }
        }
        return redirect('GiangVien/CauHoi/ThemCauHoi')->with('thongbao',"Tham Cau Hoi Thanh Cong");
    }
    public function getSuaCauHoi(Request $request, $idCH){
    	$id=$request->session()->get('idUser');
    	$monhoc=monhoc::all();
        $giangday=giangday::where('idGiangVienHT',$id)->get();
       // $cauhoi=CauHoi::where('idCauHoi',$idCH)->get();
        $cauhoi=cauhoi::find($idCH);
    	$level=level::all();
    	$chude=chude::all();
    	return view('GiangVien.CauHoi.ChinhSuaCauHoi',compact('monhoc','giangday','level','chude','cauhoi'));
    }
    public function postSuaCauHoi(Request $request,$idCH){
    	$this->validate($request,[
    		'ChonMonHoc'=>'required',
    		'ChonChuDe'=>'required',
    		'ChonLevel'=>'required',
    		'txtNoiDung'=>'required|min:5',
    		'txtPhuongAnA'=>'required|min:1',
    		'txtPhuongAnB'=>'required|min:1',
    		'txtPhuongAnC'=>'required|min:1',
    		'txtPhuongAnD'=>'required|min:1',
    	],[
    		'ChonMonHoc.required'=>'Ban Chua Chon Loai Tin',
    		'ChonChuDe.required'=>'Ban Chua Chon Chu De',
    		'ChonLevel.required'=>'Ban Chua Chon Level',
    		'txtNoiDung.required'=>'Ban Chua Nhap Noi Dung',
    		'txtNoiDung.min'=>'Noi Dung phai co it nhat 5 ky tu',
    		'txtPhuongAnA.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnA.min'=>'Noi Dung phai co it nhat 1 ky tu',
    		'txtPhuongAnB.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnB.min'=>'Noi Dung phai co it nhat 1 ky tu',
    		'txtPhuongAnC.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnC.min'=>'Noi Dung phai co it nhat 1 ky tu',
    		'txtPhuongAnD.required'=>'Ban Chua Nhap Noi Dung',
    		'txtPhuongAnD.min'=>'Noi Dung phai co it nhat 1 ky tu',
    	]);
    	$cauhoi=cauhoi::find($idCH);
    	$cauhoi->idMonHoc=$request->ChonMonHoc;
    	$cauhoi->idChuDe=$request->ChonChuDe;
    	$cauhoi->idLevel=$request->ChonLevel;
    	$cauhoi->NoiDung=$request->txtNoiDung;
    	$cauhoi->PhuongAnA=$request->txtPhuongAnA;
    	$cauhoi->PhuongAnB=$request->txtPhuongAnB;
    	$cauhoi->PhuongAnC=$request->txtPhuongAnC;
    	$cauhoi->PhuongAnD=$request->txtPhuongAnD;
    	$cauhoi->DapAn=$request->dapan;
    	$cauhoi->TrangThai=1;
    	$cauhoi->idNguoiTao=$request->session()->get('idUser');
    	$ldate = date('Y-m-d');
    	$cauhoi->NgayDuocTao=$ldate;

    	if($request->hasFile('urlHinh')){
    		$file=$request->file('urlHinh');
    		$duoi=$file->getClientOriginalExtension();
    		if($duoi !='jpg' && $duoi !='png'){
    			return redirect('GiangVien/CauHoi/ThemCauHoi')->with('loi',"Chi upload file jpg hoac png");
    		}
    		$name=$file->getClientOriginalName();
    		$newname=str_random(4)."_".$name;
    		while (file_exists("Upload/CauHoi/".$newname)) {
    			$newname=str_random(4)."_".$name;
    		}
    		$file->move("Upload/CauHoi",$newname);
    		$cauhoi->urlHinh=$newname;
    	}else{
    		$cauhoi->urlHinh="";
    	}
    	$cauhoi->save();
    	return redirect('GiangVien/CauHoi/SuaCauHoi/'.$idCH)->with('thongbao',"Chinh Sua Cau Hoi Thanh Cong");
    }
    public function getXoaCauHoi(Request $request,$idCH){
    	$id=$request->session()->get('idUser');
        $cauhoi=cauhoi::find($idCH);
        $idMH=monhoc::find($cauhoi->idMonHoc);
        $cauhoi->TrangThai=0;
        $cauhoi->save();
        return redirect('GiangVien/CauHoi/DanhSachCauHoi/'.$idMH->idMonHoc)->with('thongbaoxoa','Xoa thanh cong');
    }
    public function getChiTietCauHoi(Request $request,$idCH){
    	$cauhoi=cauhoi::find($idCH);
    	$id=$request->session()->get('idUser');
    	$monhoc=monhoc::all();
        $giangday=giangday::where('idGiangVienHT',$id)->get();
    	$level=level::all();
    	$chude=chude::all();
    	return view('GiangVien/CauHoi/ChiTietCauHoi',compact('cauhoi','monhoc','giangday','level','chude'));
    }
}
