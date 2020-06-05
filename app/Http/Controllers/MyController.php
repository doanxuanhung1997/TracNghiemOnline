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
use App\tailieu;
use App\thongbao;
use App\users;
use Hash;
use DB;

class MyController extends Controller
{
    function getIndex(Request $request){
    	$monhoc=monhoc::all();
        $idUser=$request->session()->get('idUser');
        //echo $idUser;
        //$idUser=$request->session()->get('idUser');
        $giangday=giangday::where('idGiangVienHT',$idUser)->get();
        return view('GiangVien.layout.index',compact('monhoc','giangday','idUser'));
    }
    function index(Request $request){
    	$idUser=$request->session()->get('idUser');
    	return view('thionline.thaotac.trangchu',compact('idUser'));
    }
    public function LamBaiThi(Request $request,$idDT){
        $monhoc=monhoc::all();
        //$tintuc=tintuc::all();
        //$dethi=dethi::all();
        //$thongbao=thongbao::all();

    	$idUser=$request->session()->get('idUser');
    	$dethi=dethi::find($idDT);
    	//$cauhoi=CauHoi::where('idMonHoc',$dethi->idMonHoc)->get();
    	//$chitietdethi=ChiTietDeThi::where('idDeThi',$idDT)->paginate(1);
    	$dethikhac=dethi::where([
     		['idDeThi','<>',$idDT],
     		['idMonHoc',$dethi->idMonHoc],
     	])->inRandomOrder()->take(5)->get();
    	return view('thionline.HocVien.LamBaiThi',compact('idUser','dethi','dethikhac','monhoc'));
    }
    public function getDoTest(Request $request,$idDT){
        $monhoc=monhoc::all();
        $idUser=$request->session()->get('idUser');
        $dethi=dethi::find($idDT);
        $cauhoi=cauhoi::where('idMonHoc',$dethi->idMonHoc)->get();
        $chitietdethi=chitietdethi::where('idDeThi',$idDT)->get();//paginate(1);
        $socaumottrang=1;
        $sotrang=$dethi->SoLuongCau;
        return view('thionline.HocVien.DoTest',compact('idUser','dethi','cauhoi','chitietdethi','sotrang','monhoc'));
    }
    public function getLichSuHocTap(Request $request){
        $monhoc=monhoc::all();
    	$idUser=$request->session()->get('idUser');
    	$bangdiem=bangdiem::where('idHocVien',$idUser)->get();
        $topdiem=DB::table('bangdiem')->orderBy('diemso','desc')->take(5)->get();
        $user=users::all();
        $dethi=dethi::all();
    	return view('thionline.HocVien.LichSuHocTap',compact('dethi','idUser','bangdiem','monhoc','topdiem','user'));
    }
    public function NopBaiThi(Request $request,$idDT){
        $monhoc=monhoc::all();
    	$dethi=dethi::find($idDT);
        $dsch=cauhoi::where('idMonHoc',$dethi->idMonHoc)->get();
    	$soluongcau=$dethi->SoLuongCau;
    	$ctdt=chitietdethi::where('idDeThi',$idDT)->get();
    	$count=0;
        $dspa=array();
        $n=0;
        $dspa[$n]='0';
        $cau=1;
    	foreach ($ctdt as $ct) {
    		$idCH=$ct->idCauHoi;
    		$cauhoi="cau".$cau;
    		$pa=$request->$cauhoi;
            $dspa[$n]=$pa;
    		$da= $ct->DapAn;
           
    		if($pa === $da){
    			$count+=1;
    		}
            $n+=1;
            $cau+=1;
    	}
    	$diem=round($count/$soluongcau*10,2) ;
    	$solanthi=$dethi->SoLanThi;
    	$dethi->SoLanThi=$solanthi+1;
    	$dethi->save();
    	$idUser=$request->session()->get('idUser');
    	$bangdiem=new bangdiem;
    	$bangdiem->idHocVien=$idUser;
    	$bangdiem->TenDeThi=$dethi->TenDeThi;
    	$bangdiem->DiemSo=$diem;
        $bangdiem->NgayLamBai=date('Y-m-d');
        $bangdiem->created_at=date('Y-m-d');
    	$bangdiem->updated_at=date('Y-m-d');
    	$bangdiem->save();
    	//return redirect('HocVien/LichSuHocTap')->with('thongbao',"Bạn Đã Hoàn Thành Bài Thi Với ".$diem." điểm !");
        $dethikhac=dethi::where([
            ['idDeThi','<>',$idDT],
            ['idMonHoc',$dethi->idMonHoc],
        ])->inRandomOrder()->take(5)->get();
        return view('thionline.HocVien.ShowResult',compact('idUser','dethi','diem','dspa','ctdt','dsch','dethikhac','monhoc'));
    }
    public function getAjaxCauhoi(Request $request,$id){
        $chitietdethi=chitietdethi::where('idDeThi',$id)->first();
        $cauhoi=cauhoi::where('idCauHoi',$chitietdethi->idCauHoi)->first();
        //echo $cauhoi->idCauHoi;
        return view('thionline.HocVien.AjaxDoExem',compact('cauhoi'));
    }
    public function getAjaxCauhoi2(Request $request,$idCH){
        $cauhoi=cauhoi::where('idCauHoi',$idCH)->first();
        //echo $cauhoi->idCauHoi;
        return view('thionline.HocVien.AjaxDoExem',compact('cauhoi'));
    }

    

    public function login(Request $request)
    {
        if(Auth::attempt(['username'=>$request->UserName, 'password'=>$request->PassWord]))
        {
            $ss=$request->session();
            if(Auth::user()->idtype==1)
                return redirect('admin/user/danhsach');
            elseif (Auth::user()->idtype==2) {
                $ss->put('idUser',Auth::user()->id);
                return redirect('GiangVien/index');
            }
            elseif (Auth::user()->idtype==3) {
                $ss->put('idUser',Auth::user()->id);
                return redirect('trangchu');
            }
            else
                return redirect('trangchu');
        }
        else
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công. Hãy thử lại !!!');
    }


    public function logout(Request $request)
    {
        $ss=$request->session();
        $ss->put('idUser',"");
        Auth::logout();
        return redirect('trangchu');
    }
    
    public function loadTrangChu()
    {
        $monhoc=monhoc::all();
        $tintuc=tintuc::all();
        //$dethi=dethi::all();
        $dethi=dethi::where([
              ['TrangThai','=',1],
            ])->get();
        $thongbao=thongbao::all();
        $user=users::all();
        $dem=0;
        $topdiem=DB::table('bangdiem')->orderBy('diemso','desc')->take(5)->get();
        $dsch=array();
        foreach ($monhoc as $mh) {
          //  echo "Danh Sach De Thi Mon :".$mh->TenMonHoc."<br>";
            $dtmh=DeThi::where([
            ['idMonHoc',$mh->idMonHoc],
            ['TrangThai','=',1],
            ])->inRandomOrder()->take(3)->get();
            foreach ($dtmh as $dt) {
                array_push($dsch, $dt);
                $dem++;
            }
    
        }
        return view('thionline.thaotac.trangchu',compact('monhoc','dethi','tintuc','dem','dsch','thongbao','topdiem','user'));
    }

    public function loadDangNhap(){
         $monhoc=monhoc::all();
         return view('thionline.thaotac.dangnhap',['monhoc'=>$monhoc]);
    }
    public function loadDangKy(){
        $monhoc=monhoc::all();
         return view('thionline.thaotac.dangky',['monhoc'=>$monhoc]);
    }

    public function SVDangKy(Request $request)
    {
        //Validate form tạo tài khoản
        $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa)
            [
                'txtUser' => 'unique:users,username|min:6|max:30',
                'txtPass' => 'min:6|max:21',
                'txtName' => 'min:6|max:30',
                'txtEmail' => 'unique:users,email|min:10|max:50',
            ],
            // Xuất ra thông báo
            [
                'txtUser.unique'=>'Tên Tài Khoản đã tồn tại',
                'txtUser.min'=>'Độ dài tên Tài Khoản nằm trong khoảng từ 6-30 ký tự',
                'txtUser.max'=>'Độ dài tên Tài Khoản nằm trong khoảng từ 6-30 ký tự',

           
                'txtPass.min'=>'Độ dài Password nằm trong khoảng từ 6-21 ký tự',
                'txtPass.max'=>'Độ dài Password nằm trong khoảng từ 6-21 ký tự',

          
                'txtName.min'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',
                'txtName.max'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',

                'txtEmail.unique'=>'Email đã tồn tại',
                'txtEmail.min'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',
                'txtEmail.max'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',
               
            ]);
         // Tạo 1 đối tượng Account
        $users = new users;
        
        $users->username = $request->txtUser;
        $users->HoTen = $request->txtName;
        $users->password =  bcrypt($request->txtPass);
        $users->NgaySinh = $request->birthday;
        $users->email = $request->txtEmail;
        $users->GioiTinh = $request->rdoSex;

        $users->DiaChi = "";
        $users->urlHinh = "user1.jpg";
        $users->idtype = 3;

        $users->save(); //Lưu lại

        return redirect('dangky')->with('thongbao','Đăng ký thành công');
    }

    public function DanhSachDeThi($ma){
        $monhoc=monhoc::all();
        $tintuc=tintuc::all();
        //$dethi=dethi::all();
        $dethi=dethi::where([
              ['TrangThai','=',1],
            ])->get();

        if($ma==100)
        {
           // $dsdethi=dethi::paginate(6);
            $dsdethi=dethi::where([
              ['TrangThai','=',1],
            ])->paginate(6);
        }
        else
        {
           // $dsdethi=dethi::where('idMonHoc',$ma)->paginate(3);
            $dsdethi=dethi::where([
              ['idMonHoc','=',$ma],
              ['TrangThai','=',1],
            ])->paginate(6);
        }

        //$dsdethi=dethi::paginate(5);
        //$dethi1=dethi::where('NgayDuocTao','>','2018-11-05')->get();
    
        return view('thionline.thaotac.danhsachdethi',['monhoc'=>$monhoc,'dethi'=>$dethi,'dsdethi'=>$dsdethi,'tintuc'=>$tintuc,'ma'=>$ma]);
    }
    public function postDanhSachDeThi(Request $request){
        $monhoc=monhoc::all();
        $tintuc=tintuc::all();
        //$dethi=dethi::all();
        $dethi=dethi::where([
              ['TrangThai','=',1],
            ])->get();
        $ma=$request->MonHoc;
        if($ma==100)
        {
            $dsdethi=dethi::paginate(6);
        }
        else
        {
            $dsdethi=dethi::where('idMonHoc',$ma)->paginate(3);
        }

        //$dsdethi=dethi::paginate(5);
        //$dethi1=dethi::where('NgayDuocTao','>','2018-11-05')->get();
        return redirect('danhsachdethi/'.$ma);
    }

    public function xemTinTuc($id){
        $monhoc=monhoc::all();
        $tintuc=tintuc::where('idTinTuc','!=',$id)->get();
        $tinxem=tintuc::find($id);
        //$dethi=dethi::all();
        $dethi=dethi::where([
              ['TrangThai','=',1],
            ])->get();

        //$dethi1=dethi::where('NgayDuocTao','>','2018-11-05')->get();
    
        return view('thionline.thaotac.xemtintuc',['monhoc'=>$monhoc,'dethi'=>$dethi,'tintuc'=>$tintuc,'tinxem'=>$tinxem]);
    }

    public function xemThongBao($id){
        $monhoc=monhoc::all();
        $thongbao=thongbao::where('idThongBao','!=',$id)->get();
        $thongbaoxem=thongbao::find($id);
        //$dethi=dethi::all();
        $dethi=dethi::where([
              ['TrangThai','=',1],
            ])->get();
       

        //$dethi1=dethi::where('NgayDuocTao','>','2018-11-05')->get();
    
        return view('thionline.thaotac.xemthongbao',['monhoc'=>$monhoc,'dethi'=>$dethi,'thongbao'=>$thongbao,'thongbaoxem'=>$thongbaoxem]);
    }    
    public function getTaiLieu(){
        $monhoc=monhoc::all();
        //$thongbao=thongbao::where('idThongBao','!=',$id)->get();
        //$thongbaoxem=thongbao::find($id);
        $tailieu=tailieu::all();
        //$dethi=dethi::all();
        $dethi=dethi::where([
              ['TrangThai','=',1],
            ])->get();
       

        //$dethi1=dethi::where('NgayDuocTao','>','2018-11-05')->get();
    
        return view('thionline.thaotac.xemtailieu',compact('monhoc','dethi','tailieu'));
    }

    //SInh viên đổi mật khẩu

    public function getDoiMatKhau()
    {
        $monhoc=monhoc::all();
        return view('thionline.thaotac.svdoimatkhau',compact('monhoc'));
    }

    public function postDoiMatKhau($id, Request $request)
    {
        $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa)
            [
                'passwordcu' => 'min:6|max:21',
                'passwordmoi2' => 'min:6|max:21',
            ],
            // Xuất ra thông báo
            [
             
                'passwordcu.min'=>'Độ dài Password cũ phải trong khoảng từ 6-21 ký tự',
                'passwordcu.max'=>'Độ dài Password cũ phải trong khoảng từ 6-21 ký tự',
          
                'passwordmoi2.min'=>'Độ dài Password mới phải trong khoảng từ 6-21 ký tự',
                'passwordmoi2.max'=>'Độ dài Password mới phải trong khoảng từ 6-21 ký tự'
            ]);

        $users=users::find($id);
        if (Hash::check($request->passwordcu, $users->password))
        {
            $users->password=bcrypt($request->passwordmoi1);
            $users->save();
            return redirect('svdoimatkhau')->with('thongbao','Đổi mật khẩu thành công');
        }
        else
            return redirect('svdoimatkhau')->with('thongbao','Mật khẩu cũ hiện tại không chính xác. Hãy thử lại');
    }

    //Xem thông tin sinh viên and edit

    public function xemThongTin()
    {   
        $monhoc=monhoc::all();
        return view('thionline.thaotac.thongtinsv',compact('monhoc'));
    }

    public function postThongTin(Request $request,$id)
    {
        $users = users::find($id); //lấy tài khoản có id=... để sửa
         $this->validate($request,
            // kiểm tra dữ liệu nhập (required: chưa nhập; min_max : độ dài tối thiểu tối đa; unique: kiểm tra tồn tại chưa)
            [
                'txtName' => 'min:6|max:30',
                'txtEmail' => 'min:10|max:50',
                'txtAddress' => 'max:70'
            ],
            // Xuất ra thông báo
            [
                'txtName.min'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',
                'txtName.max'=>'Độ dài Họ Tên nằm trong khoảng từ 6-30 ký tự',

                'txtEmail.min'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',
                'txtEmail.max'=>'Độ dài Email nằm trong khoảng từ 10-50 ký tự',

                'txtAddress.max'=>'Độ dài Địa Chỉ dưới 70 ký tự'
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
                return redirect('thongtinsv')->with('thongbao','Hình đại diện không phải là file Ảnh (png,jpg,jpeg)');
            }
        }
        $users->DiaChi = $request->txtAddress;

        $users->save(); //Lưu lại

        //trở lại trang sửa tài khoản với thông báo
        return redirect('thongtinsv')->with('thongbao','Lưu lại thông tin thành công !!!');
    }
}
