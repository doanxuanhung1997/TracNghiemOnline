<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\thongbao;
use App\giangday;
class ThongBaoController extends Controller
{
    public function getDanhSach(Request $request){
        $idUser=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
    	$thongbao=thongbao::paginate(5);
    	return view('GiangVien.ThongBao.DanhSachThongBao',compact('thongbao','giangday'));
    }
    public function getThemTB(Request $request){
        $idUser=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
    	return view('GiangVien.ThongBao.ThemThongBao',compact('giangday'));
    }
    public function postThemTB(Request $request){
    	$this->validate($request,[
            'txtTieuDe'=>'required|min:10',
    		'txtNoiDung'=>'required|min:20'
        ]);
        DB::table('ThongBao')->insert([
        	'TieuDe'=>$request->txtTieuDe,
        	'NoiDung'=>$request->txtNoiDung,
        	'idNguoiGui'=>$request->session()->get('idUser'),
                    'NgayDang'=>\Carbon\Carbon::now()->toDateTimeString(),
                    'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return redirect('GiangVien/ThongBao/ThemThongBao')->with('thongbao',"Them Thong Bao Thanh Cong");
    }
}
