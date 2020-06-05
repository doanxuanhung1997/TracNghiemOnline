<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\GiangDay;
class TinTucController extends Controller
{
    public function getDanhSach(Request $request){
    	$idUser=$request->session()->get('idUser');
     	$tintuc=TinTuc::where([
     		['idGiangVien',$idUser],
     		['AnHien',1],
     	])->orderBy('idTinTuc','DESC')->paginate(5);
        $giangday=GiangDay::where('idGiangVienHT',$idUser)->get();
        return view('GiangVien.TinTuc.DanhSachTinTuc',compact('tintuc','giangday'));
    }
    public function getChiTietTin(Request $request,$idTin){
    	$tintuc=TinTuc::where([
     		['idTinTuc',$idTin],
     	])->first();
     	$idUser=$request->session()->get('idUser');
        $giangday=GiangDay::where('idGiangVienHT',$idUser)->get();
     	$tinkhac=TinTuc::where([
     		['idTinTuc','<>',$idTin],
     		['idGiangVien',$idUser],
     		['AnHien',1],
     	])->inRandomOrder()->take(5)->get();
        return view('GiangVien.TinTuc.ChiTietTinTuc',compact('tintuc','tinkhac','giangday'));
    }
    public function getThemTin(Request $request){
        $idUser=$request->session()->get('idUser');
        $giangday=GiangDay::where('idGiangVienHT',$idUser)->get();
    	return view('GiangVien.TinTuc.ThemTinTuc',compact('giangday'));
    }
    public function postThemTin(Request $request){
    	$this->validate($request,[
            'txtTieuDe'=>'required|min:20',
    		'txtTomTat'=>'required|min:20',
    		'txtNoiDung'=>'required|min:50'
        ]);
        $tintuc=new TinTuc;
        $tintuc->TieuDe=$request->txtTieuDe;
        $tintuc->TomTat=$request->txtTomTat;
        $tintuc->NoiDung=$request->txtNoiDung;
        $tintuc->AnHien=1;
        $tintuc->NgayTao=date('Y-m-d');
        $tintuc->idGiangVien=$request->session()->get('idUser');
        if($request->hasFile('urlHinh')){
    		$file=$request->file('urlHinh');
    		$duoi=$file->getClientOriginalExtension();
    		if($duoi !='jpg' && $duoi !='png' && $duoi !='JPG' && $duoi !='PNG'){
    			return redirect('GiangVien/TinTuc/ThemTinTuc')->with('loi',"Chi upload file jpg hoac png");
    		}
    		$name=$file->getClientOriginalName();
    		$newname=str_random(4)."_".$name;
    		while (file_exists("Upload/TinTuc/".$newname)) {
    			$newname=str_random(4)."_".$name;
    		}
    		$file->move("Upload/TinTuc",$newname);
    		$tintuc->urlHinh=$newname;
    	}else{
    		$tintuc->urlHinh="";
    	}
    	$tintuc->save();
    	return redirect('GiangVien/TinTuc/ThemTinTuc')->with('thongbao',"Tham Tin Moi Thanh Cong");
    }
    public function getChinhSuaTin(Request $request,$idTin){
        $idUser=$request->session()->get('idUser');
        $giangday=GiangDay::where('idGiangVienHT',$idUser)->get();
        $tintuc=TinTuc::where('idTinTuc',$idTin)->first();
        return view('GiangVien/TinTuc/ChinhSuaTinTuc',compact('tintuc','giangday'));
    }
    public function postChinhSuaTin(Request $request,$idTin){
        $this->validate($request,[
            'txtTieuDe'=>'required|min:20',
            'txtTomTat'=>'required|min:20',
            'txtNoiDung'=>'required|min:50'
        ]);
        $tintuc=TinTuc::find($idTin);
        $tintuc->TieuDe=$request->txtTieuDe;
        $tintuc->TomTat=$request->txtTomTat;
        $tintuc->NoiDung=$request->txtNoiDung;
        $tintuc->AnHien=1;
        $tintuc->NgayTao=date('Y-m-d');
        $tintuc->idGiangVien=$request->session()->get('idUser');
        if($request->hasFile('urlHinh')){
            $file=$request->file('urlHinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png'){
                return redirect('GiangVien/TinTuc/ThemTinTuc')->with('loi',"Chi upload file jpg hoac png");
            }
            $name=$file->getClientOriginalName();
            $newname=str_random(4)."_".$name;
            while (file_exists("Upload/TinTuc/".$newname)) {
                $newname=str_random(4)."_".$name;
            }
            $file->move("Upload/TinTuc",$newname);
            $tintuc->urlHinh=$newname;
        }else{
            $tintuc->urlHinh="";
        }
        $tintuc->save();
        return redirect('GiangVien/TinTuc/ChinhSuaTin/'.$idTin)->with('thongbao',"Chinh Sua Tin  Thanh Cong");
    }
    public function getXoaTinTuc(Request $request,$idTT){
        $id=$request->session()->get('idUser');
        $tintuc=tintuc::find($idTT);
        $tintuc->AnHien=0;
        $tintuc->save();
        
       // $giangday=giangday::where('idGiangVienHT',$id)->get();
        return redirect('GiangVien/TinTuc/DanhSachTinTuc')->with('thongbaoxoa','Xoa thanh cong');
    }
}
