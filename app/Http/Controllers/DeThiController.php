<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dethi;
use App\chitietdethi;
use App\giangday;
use App\cauhoi;
use App\monhoc;
use App\chude;
use App\level;
class DeThiController extends Controller
{
    // public function getDanhSach(Request $request){
    // 	$monhoc=MonHoc::all();
    // 	$idUser=$request->session()->get('idUser');
    // 	$giangday=GiangDay::where('idgiangVienHT',$idUser)->get();
    // 	return view('GiangVien.DeThi.DanhSachDeThi',compact('monhoc','giangday'));
    // }
    public function getDanhSach(Request $request,$idMH){
        $idUser=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
        $dethi=dethi::where([
              ['idMonHoc','=',$idMH],
              ['idNguoiTao','=',$idUser],
              ['TrangThai','=',1],
            ])->paginate(6);
        $monhoc=monhoc::where('idMonHoc',$idMH)->first();
        return view('GiangVien.DeThi.DanhSachDeThi',compact('monhoc','dethi','giangday','idUser'));
    }
    public function getThemDeThi(Request $request){
    	$id=$request->session()->get('idUser');
    	$monhoc=monhoc::all();
    	$giangday=giangday::where('idgiangVienHT',$id)->get();
    	return view('GiangVien.DeThi.ThemDeThi',compact('monhoc','giangday'));
    }
    public function test(){
    	// DB::table('orders')->where('id', DB::raw("(select max(`id`) from orders)"))->get();
    	// $order = Orders::whereRaw('id = (select max(`id`) from orders)')->get();
    	// DB::table('orders')->find(DB::table('orders')->max('id'));
    	// $order = Orders::find(DB::table('orders')->max('id'));
        //Orders::max('id');
        //DB::table('orders')->find(DB::table('orders')->max('id'));
    	$idDTNow=dethi::whereRaw('idDeThi=(select max(idDeThi) from dethi)')->first();
    	print($idDTNow);
        echo "<br><br>";
        echo $idDTNow->idDeThi+1;
    }
    public function postThemDeThi(Request $request){
    	$id=$request->session()->get('idUser');
        $idDTNow=dethi::whereRaw('idDeThi=(select max(idDeThi) from dethi)')->first();
    	$dethi=new dethi;
        if($idDTNow->idDeThi==""){
            $idDTNow->idDeThi=0;
        }
        $dethi->idDeThi=$idDTNow->idDeThi+1;
    	$dethi->idMonHoc=$request->idMH;
    	$dethi->TenDeThi=$request->TenDeThi;
    	$dethi->ThoiGian=$request->ThoiGian;
    	$dethi->SoLanThi=0;
    	$ldate = date('Y-m-d');
    	$dethi->NgayDuocTao=$ldate;
    	$dethi->idNguoiTao=$id;
    	$dethi->TrangThai=1;
    	$SoLuongCau=0;
    	$chude=chude::where('idMonHoc',$request->idMH)->get();
    	$level=level::all();
    	foreach ($chude as $cd) {
           // echo "</br>$cd->TenChuDe";
    		foreach ($level as $lv) {
                // echo "</br>$lv->NameLevel";
    			$name="SL".$cd->idChuDe."-".$lv->idLevel;
    			$soluong=$request->$name;
    			//$SoLuongCau=$SoLuongCau+$soluong;
    			if($soluong!=0){
                    //
                    $count=CauHoi::where([
                        ['idMonHoc','=',$request->idMH],
                        ['idLevel','=',$lv->idLevel],
                        ['idChuDe','=',$cd->idChuDe],
                    ])->count();
                   // echo "$count";
                    if($soluong>=$count){
                        $SoLuongCau=$SoLuongCau+$count;
                        //
                            $data=CauHoi::where([
                            ['idMonHoc','=',$request->idMH],
                            ['idLevel','=',$lv->idLevel],
                            ['idChuDe','=',$cd->idChuDe],
                        ])->inRandomOrder()->take($count)->get();
                        foreach ($data as $dt ) {
                            $ctdt=new ChiTietDeThi;
                            $ctdt->idCauHoi=$dt->idCauHoi;
                            $ctdt->DapAn=$dt->DapAn;
                            $ctdt->idDeThi=$idDTNow->idDeThi+1;
                            $ctdt->save();
                        }
                        //
                    }
                    if($soluong < $count){
                        $SoLuongCau=$SoLuongCau+$soluong;
                            $data=CauHoi::where([
                            ['idMonHoc','=',$request->idMH],
                            ['idLevel','=',$lv->idLevel],
                            ['idChuDe','=',$cd->idChuDe],
                        ])->inRandomOrder()->take($soluong)->get();
                        foreach ($data as $dt ) {
                            $ctdt=new ChiTietDeThi;
                            $ctdt->idCauHoi=$dt->idCauHoi;
                            $ctdt->DapAn=$dt->DapAn;
                            $ctdt->idDeThi=$idDTNow->idDeThi+1;
                            $ctdt->save();
                        }
                    }

    				
    			}
    		}
    	}
    	
    	$dethi->SoLuongCau=$SoLuongCau;
    	$dethi->save();
    	return redirect('GiangVien/DeThi/ThemDeThi')->with('thongbao',"Them De Thi Thanh Cong");
    }
    public function postTuyChonCauHoi(Request $request){
        $id=$request->session()->get('idUser');
        $idDTNow=dethi::whereRaw('idDeThi=(select max(idDeThi) from dethi)')->first();
        $dethi=new dethi;
        $dethi->idDeThi=$idDTNow->idDeThi+1;
        $dethi->idMonHoc=$request->idMH;
        $dethi->TenDeThi=$request->TenDeThi;
        $dethi->ThoiGian=$request->ThoiGian;
        $dethi->SoLanThi=0;
        $ldate = date('Y-m-d');
        $dethi->NgayDuocTao=$ldate;
        $dethi->idNguoiTao=$id;
        $dethi->TrangThai=1;
        $SoLuongCau=0;
    	$cauhoidethi=$request->cauhoidethi;
        if($cauhoidethi !=""){
            foreach ($cauhoidethi as $key ) {
            $cauhoi=cauhoi::where('idCauHoi',$key)->first();
            $SoLuongCau +=1;
            $ctdt=new ChiTietDeThi;
            $ctdt->idCauHoi=$cauhoi->idCauHoi;
            $ctdt->DapAn=$cauhoi->DapAn;
            $ctdt->idDeThi=$idDTNow->idDeThi+1;
            $ctdt->save();
            }
        }
        
        $dethi->SoLuongCau=$SoLuongCau;
        $dethi->save();
        return redirect('GiangVien/DeThi/ThemDeThi')->with('thongbao',"Them De Thi Thanh Cong");
    }
    public function postThemCauHoiVaoDeThi(Request $request){
        $id=$request->session()->get('idUser');
        $idDT=$request->idDT;
        $idMH=$request->idMH;
        $dethi=dethi::where('idDeThi',$idDT)->first();
        $SoLuongCau=$dethi->SoLuongCau;
        $cauhoidethi=$request->cauhoidethi;
        foreach ($cauhoidethi as $key ) {
            $cauhoi=cauhoi::where('idCauHoi',$key)->first();
            $SoLuongCau +=1;
            $ctdt=new chitietdethi;
            $ctdt->idCauHoi=$cauhoi->idCauHoi;
            $ctdt->DapAn=$cauhoi->DapAn;
            $ctdt->idDeThi=$idDT;
            $ctdt->save();
        }
        $dethi->SoLuongCau=$SoLuongCau;
        $dethi->save();
        return redirect('GiangVien/DeThi/SuaDeThi/'.$idDT)->with('thongbao',"Them Cau Hoi Vao De Thi Thanh Cong");
    }
    public function getChiTietDeThi(Request $request,$idDT){
        $dethi=dethi::find($idDT);
        $ctdt=chitietdethi::where('idDeThi',$idDT)->get();
        $id=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$id)->get();
        $monhoc=monhoc::where('idMonHoc',$dethi->idMonHoc)->first();
        $cauhoi=cauhoi::where('idMonHoc',$dethi->idMonHoc)->get();
        return view('GiangVien/DeThi/ChiTietDeThi',compact('giangday','dethi','monhoc','ctdt','cauhoi'));
       
    }
    public function getChinhSuaDeThi(Request $request,$idDT){
        $dethi=dethi::find($idDT);
        $ctdt=chitietdethi::where('idDeThi',$idDT)->get();
        $id=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$id)->get();
        $monhoc=monhoc::where('idMonHoc',$dethi->idMonHoc)->first();
        $cauhoi=cauhoi::where('idMonHoc',$dethi->idMonHoc)->get();
        return view('GiangVien/DeThi/ChinhSuaDeThi',compact('giangday','dethi','monhoc','ctdt','cauhoi'));
       
    }
    public function postThayDoiTenThoiGianDeThi(Request $request,$idDT){
        $dethi=dethi::find($idDT);
        $dethi->TenDeThi=$request->TenDeThi;
        $dethi->ThoiGian=$request->ThoiGian;
        $dethi->save();
        return redirect('GiangVien/DeThi/SuaDeThi/'.$idDT)->with('thongbao',"Chinh Sua De Thi Thanh Cong");
    }
    public function postXoaCauHoiKhoiDeThi(Request $request,$idDT){
        $id=$request->session()->get('idUser');
        $idMH=$request->idMH;
        $dethi=dethi::where('idDeThi',$idDT)->first();
        $SoLuongCau=$dethi->SoLuongCau;
        $cauhoidethi=$request->cauhoidethi;
        foreach ($cauhoidethi as $key ) {
            $cauhoi=cauhoi::where('idCauHoi',$key)->first();
            $SoLuongCau -=1;
            $ctdt=chitietdethi::where([
                        ['idDeThi','=',$idDT],
                        ['idCauHoi','=',$cauhoi->idCauHoi],
                    ])->delete();
        }
        $dethi->SoLuongCau=$SoLuongCau;
        $dethi->save();
        return redirect('GiangVien/DeThi/SuaDeThi/'.$idDT)->with('thongbao',"Xoa Cau Hoi Khoi De Thi Thanh Cong");
    }
    public function getXoaDeThi(Request $request,$idDT){
        $id=$request->session()->get('idUser');
        $dethi=dethi::find($idDT);
        $dethi->TrangThai=0;
        $dethi->save();
        $monhoc=monhoc::find($dethi->idMonHoc);
        $giangday=giangday::where('idGiangVienHT',$id)->get();
        return redirect('GiangVien/DeThi/DanhSachDeThi/'.$monhoc->idMonHoc)->with('thongbaoxoa','Xoa thanh cong');
    }
}
