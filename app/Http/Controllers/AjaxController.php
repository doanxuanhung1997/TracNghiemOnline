<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cauhoi;
use App\monhoc;
use App\chude;
use App\level;
use App\dethi;
use App\chitietdethi;
use App\tailieu;
use App\thongbao;
class AjaxController extends Controller
{
    public function getDanhSachCauHoi(Request $request, $idMH){
      $id=$request->session()->get('idUser');
    	$cauhoi=cauhoi::where([
              ['idMonHoc','=',$idMH],
              ['idNguoiTao','=',$id],
              ['TrangThai','=',1],
            ])->get();
    	echo "<table class='table table-bordered'> 
    			<thead>
      			<tr>
        			<th>idCauHoi</th>
			        <th>Noi Dung</th>
			        <th>Chu De</th>
			        <th>Ngay Tao</th>
			        <th>Chi Tiet</th>
			        <th>Chinh Sua</th>
			        <th>Xoa</th>
      			</tr>
    		</thead>
    		<tbody>";
    		foreach ($cauhoi as $ch) {
      			echo " <tr>
        			<td>".$ch->idCauHoi."</td>
        			<td>".$ch->NoiDung."</td>
        			<td>".$ch->chude->TenChuDe."</td>
        			<td>".$ch->NgayDuocTao."</td>
        			<td><a href='GiangVien/CauHoi/ChiTietCauHoi/".$ch->idCauHoi."'><img class='icon chitiet' idcauhoi='".$ch->idCauHoi."' src='images/iconct.jpg'></a></td>
        			<td><a href='GiangVien/CauHoi/SuaCauHoi/".$ch->idCauHoi."'><img class='icon chinhsua' idcauhoi='".$ch->idCauHoi."' src='images/iconchinhsua.jpg'></a></td>
        			<td><a href='GiangVien/CauHoi/XoaCauHoi/".$ch->idCauHoi."'><img class='icon xoa' idcauhoi='".$ch->idCauHoi."' src='images/icondel.jpg'></a></td>
      			</tr>";
      		}	
      	echo	"</tbody>
  		</table>";
    }
    public function getTimCauHoi(Request $request, $idCH ){
      $id=$request->session()->get('idUser');
      $cauhoi=cauhoi::where([
              ['idCauHoi','=',$idCH],
              ['idNguoiTao','=',$id],
              ['TrangThai','=',1],
            ])->get();
      echo "<table class='table table-bordered'> 
          <thead>
            <tr>
              <th>idCauHoi</th>
              <th>Noi Dung</th>
              <th>Chu De</th>
              <th>Ngay Tao</th>
              <th>Chi Tiet</th>
              <th>Chinh Sua</th>
              <th>Xoa</th>
            </tr>
        </thead>
        <tbody>";
        foreach ($cauhoi as $ch) {
            echo " <tr>
              <td>".$ch->idCauHoi."</td>
              <td>".$ch->NoiDung."</td>
              <td>".$ch->idChuDe."</td>
              <td>".$ch->NgayDuocTao."</td>
              <td><a href='GiangVien/CauHoi/ChiTietCauHoi/".$ch->idCauHoi."'><img class='icon chitiet' idcauhoi='".$ch->idCauHoi."' src='images/iconct.jpg'></a></td>
              <td><a href='GiangVien/CauHoi/SuaCauHoi/".$ch->idCauHoi."'><img class='icon chinhsua' idcauhoi='".$ch->idCauHoi."' src='images/iconchinhsua.jpg'></a></td>
              <td><a href='GiangVien/CauHoi/XoaCauHoi/".$ch->idCauHoi."'><img class='icon xoa' idcauhoi='".$ch->idCauHoi."' src='images/icondel.jpg'></a></td>
            </tr>";
          } 
        echo  "</tbody>
      </table>";
    }
    public function getTimDeThi(Request $request, $idDT ){
      $id=$request->session()->get('idUser');
      $dethi=dethi::where([
              ['idDeThi','=',$idDT],
              ['idNguoiTao','=',$id],
              ['TrangThai','=',1],
            ])->get();
      echo "<table class='table table-bordered'>
          <thead>
            <tr>
              <th>idDeThi</th>
              <th>Ten De Thi</th>
              <th>Thoi Gian</th>
              <th>Ngay Tao</th>
              <th>Chi Tiet</th>
              <th>Chinh Sua</th>
              <th>Xoa</th>
            </tr>
        </thead>
        <tbody>";
        foreach ($dethi as $dt) {
            echo " <tr>
              <td>".$dt->idDeThi."</td>
              <td>".$dt->TenDeThi."</td>
              <td>".$dt->ThoiGian."</td>
              <td>".$dt->NgayDuocTao."</td>
              <td><a href='GiangVien/DeThi/ChiTietDeThi/".$dt->idDeThi."'><img class='icon chitiet' idcauhoi='".$dt->idDeThi."' src='images/iconct.jpg'></a></td>
              <td><a href='GiangVien/DeThi/SuaDeThi/".$dt->idDeThi."'><img class='icon chinhsua' idcauhoi='".$dt->idDeThi."' src='images/iconchinhsua.jpg'></a></td>
              <td><a href='GiangVien/DeThi/XoaDeThi/".$dt->idDeThi."'><img class='icon xoa' idcauhoi='".$dt->idDeThi."' src='images/icondel.jpg'></a></td>
            </tr>";
          } 
        echo  "</tbody>
      </table>";
    }
    public function getDanhSachDeThi(Request $request, $idMH){
      $id=$request->session()->get('idUser');
      $dethi=dethi::where([
              ['idMonHoc','=',$idMH],
              ['idNguoiTao','=',$id],
              ['TrangThai','=',1],
            ])->get();
      echo "<table class='table table-bordered'>
          <thead>
            <tr>
              <th>idDeThi</th>
              <th>Ten De Thi</th>
              <th>Thoi Gian</th>
              <th>Ngay Tao</th>
              <th>Chi Tiet</th>
              <th>Chinh Sua</th>
              <th>Xoa</th>
            </tr>
        </thead>
        <tbody>";
        foreach ($dethi as $dt) {
            echo " <tr>
              <td>".$dt->idDeThi."</td>
              <td>".$dt->TenDeThi."</td>
              <td>".$dt->ThoiGian."</td>
              <td>".$dt->NgayDuocTao."</td>
              <td><a href='GiangVien/DeThi/ChiTietDeThi/".$dt->idDeThi."'><img class='icon chitiet' idcauhoi='".$dt->idDeThi."' src='images/iconct.jpg'></a></td>
              <td><a href='GiangVien/DeThi/SuaDeThi/".$dt->idDeThi."'><img class='icon chinhsua' idcauhoi='".$dt->idDeThi."' src='images/iconchinhsua.jpg'></a></td>
              <td><a href='GiangVien/DeThi/XoaDeThi/".$dt->idDeThi."'><img class='icon xoa' idcauhoi='".$dt->idDeThi."' src='images/icondel.jpg'></a></td>
            </tr>";
          } 
        echo  "</tbody>
      </table>";

    }
    public function getDanhSachTaiLieu(Request $request, $idMH){
      $monhoc=monhoc::where('idMonHoc',$idMH)->first();
      $id=$request->session()->get('idUser');
      $tailieu=tailieu::where([
              ['idMonHoc','=',$idMH],
              ['idGiangVien','=',$id],
            ])->get();
      echo "
      <div class='wrapper'>
        <div class='panel panel-primary'>
          <div class='panel-heading'>
            Tai Lieu ".$monhoc->TenMonHoc."
          </div>
          <div class='panel-body'>
            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th>Ten Tai Lieu</th>
                  <th>Loai Tai Lieu</th>
                  <th>Ngay Dang</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>";
              foreach ($tailieu as $tl ) {
               echo "
                <tr>
                  <td>".$tl->TenTaiLieu."</td>
                  <td>".$tl->Type."</td>
                  <td>".$tl->NgayDang."</td>
                  <td><a href='Upload/TaiLieu/".$tl->TenTaiLieu."' download='".$tl->TenTaiLieu."'>
  <button type='button' class='btn btn-primary'>Download</button>
</a>
<a href='GiangVien/TaiLieu/XoaTaiLieu/".$tl->idTaiLieu."'>
  <button type='button' class='btn btn-danger'>Delete</button>
</a>
</td>
                </tr>
               ";
              }
                
      echo "
              </tbody>
            </table>
       
          </div>  
        </div>
      </div>

      ";
    }
    public function getChuDeTheoMonHoc($idMH){
    	$chude=chude::where('idMonHoc',$idMH)->get();
      
    	foreach ($chude as $cd) {
    		echo "<option value='".$cd->idChuDe."'>".$cd->TenChuDe."</option>";
    	}
    }
    public function getFormTaoDeThi($idMH){
      $chude=chude::where('idMonHoc',$idMH)->get();
      $level=level::all();
      echo "
      <div style='width: 100%;'>
           <div id='tuychoncauhoi' style='cursor: pointer;' idmh='".$idMH."' >Tuy Chon Cau Hoi</div>
      </div>
      <br>
      ";
      echo "
      <script type='text/javascript'>
        $(document).ready(function(){
            
          $('#tuychoncauhoi').click(function(){
              var idMH=$(this).attr('idmh');
              $.get('GiangVien/Ajax/TuyChonCauHoi/'+idMH,function(data){
                $('#NoiDungDeThi').html(data);
              });
          });
        });
    </script>
      ";
      echo "<form action='GiangVien/DeThi/ThemDeThi' method='POST' enctype='multipart/form-data'>";
      $tem=csrf_token();
       echo "
       <input type='hidden' name='_token' value='".$tem."'>
       ";
        echo "
        <input type='hidden' id='idMH' name='idMH' value='".$idMH."'>
        ";
      foreach ($chude as $cd) {
        echo "
        
          <div class='row'>
            <div class='col-sm-3 col-xs-12'>
              <label><h4>".$cd->TenChuDe.":</h4></label>
            </div> " ;
            foreach ($level as $lv) {
            echo "<div class='col-sm-3 col-xs-4'>
                    <label>".$lv->NameLevel."</label>
                    <input type='number' name='SL".$cd->idChuDe."-".$lv->idLevel."' value='0' min='0' max='20' style='width: 50px;'>
                  </div> ";
            }
            echo "</div>";
 
      }
       echo "
        <div class='form-group'>
          <label for=''>Ten De Thi:</label>
          <input type='text' class='form-control' name='TenDeThi'>
        </div>
        <div class='form-group'>
          <label for=''>Thoi Gian Lam Bai:</label>
          <input type='text' class='form-control' name='ThoiGian'>
        </div>
        <div style='width: 100%;text-align: center;'>
          <button type='submit' class='btn btn-success'>Submit</button>
        </div>
      </form>
      ";
    }

    public function getTuyChonCauHoi(Request$request, $idMH){
      $id=$request->session()->get('idUser');
      $cauhoi=cauhoi::where([
              ['idMonHoc','=',$idMH],
              ['idNguoiTao','=',$id],
              ['TrangThai','=',1],
            ])->get();
      echo "<form action='GiangVien/DeThi/TuyChonCauHoi' method='POST' enctype='multipart/form-data'>";
      $tem=csrf_token();
       echo "
       <input type='hidden' name='_token' value='".$tem."'>
       ";
      echo "<input type='hidden' id='idMH' name='idMH' value='".$idMH."'>";
      echo "<table class='table table-bordered'>
          <thead>
            <tr>
              <th>idCauHoi</th>
              <th>Noi Dung</th>
              <th>Chu De</th>
              <th>Ngay Tao</th>
              <th>Chon</th>
            </tr>
        </thead>
        <tbody>";

        foreach ($cauhoi as $ch) {
            echo " <tr>
              <td>".$ch->idCauHoi."</td>
              <td>".$ch->NoiDung."</td>
              <td>".$ch->idChuDe."</td>
              <td>".$ch->NgayDuocTao."</td>
              <td><input type='checkbox' name='cauhoidethi[]' value='".$ch->idCauHoi."'</td>
            </tr>";
          } 
        echo  "</tbody>
      </table>";
      echo "
        <div class='form-group'>
          <label for=''>Ten De Thi:</label>
          <input type='text' class='form-control' name='TenDeThi'>
        </div>
        <div class='form-group'>
          <label for=''>Thoi Gian Lam Bai:</label>
          <input type='text' class='form-control' name='ThoiGian'>
        </div>
        <div style='width: 100%;text-align: center;'>
          <button type='submit' class='btn btn-success'>Submit</button>
        </div>
      </form>";
    }
    public function getThemCauHoiVaoDeThi(Request $request,$idDT){
      $dethi=dethi::where('idDeThi',$idDT)->first();
      $idMH=$dethi->idMonHoc;
      $id=$request->session()->get('idUser');
      $chitietdethi=chitietdethi::where('idDeThi',$idDT)->get();
      $cauhoi=cauhoi::where([
              ['idMonHoc','=',$idMH],
              ['idNguoiTao','=',$id],
              ['TrangThai','=',1],
            ])->get();
      echo "<form action='GiangVien/DeThi/ThemCauHoiVaoDeThi' method='POST' enctype='multipart/form-data'>";
      $tem=csrf_token();
       echo "
       <input type='hidden' name='_token' value='".$tem."'>
       ";
      echo "<input type='hidden' id='idMH' name='idMH' value='".$idMH."'>";
      echo "<input type='hidden' id='idMH' name='idDT' value='".$idDT."'>";
      echo "<table class='table table-striped'>
          <thead>
            <tr>
              <th>idCauHoi</th>
              <th>Noi Dung</th>
              <th>Chu De</th>
              <th>Ngay Tao</th>
              <th><img class='icon xoa' src='images/iconadd.jpg'></th>
            </tr>
        </thead>
        <tbody>";

        foreach ($cauhoi as $ch) {
          $tem=0;
          foreach ($chitietdethi as $ctdt) {
            if ($ch->idCauHoi==$ctdt->idCauHoi) {
              $tem=1;
              break;
            }
          }
          if ($tem==0) {
            echo " <tr>
              <td>".$ch->idCauHoi."</td>
              <td>".$ch->NoiDung."</td>
              <td>".$ch->idChuDe."</td>
              <td>".$ch->NgayDuocTao."</td>
              <td><input type='checkbox' name='cauhoidethi[]' value='".$ch->idCauHoi."'</td>
            </tr>";
          }
        } 
        echo  "</tbody>
      </table>";
      echo "
        
        <div style='width: 100%;text-align: center;'>
          <button type='submit' class='btn btn-success'>Select Add</button>
        </div>
      </form>";
    }
    public function getXoaCauHoiKhoiDeThi(Request $request,$idDT){
      $dethi=dethi::where('idDeThi',$idDT)->first();
      $idMH=$dethi->idMonHoc;
      $chitietdethi=chitietdethi::where('idDeThi',$idDT)->get();
      $id=$request->session()->get('idUser');
      $cauhoi=cauhoi::where([
              ['idMonHoc','=',$idMH],
              ['idNguoiTao','=',$id],
            ])->get();
      echo "<form action='GiangVien/DeThi/XoaCauHoiKhoiDeThi/".$idDT."' method='POST' enctype='multipart/form-data'>";
      $tem=csrf_token();
       echo "
       <input type='hidden' name='_token' value='".$tem."'>
       ";
      echo "<input type='hidden' id='idMH' name='idMH' value='".$idMH."'>";
      echo "<table class='table table-bordered'>
          <thead>
            <tr>
              <th>idCauHoi</th>
              <th>Noi Dung</th>
              <th>Chu De</th>
              <th>Ngay Tao</th>
              <th><img class='icon xoa' src='images/icondel.jpg'></th>
            </tr>
        </thead>
        <tbody>";
        foreach ($chitietdethi as $ctdt) {
          foreach ($cauhoi as $ch) {
            if ($ctdt->idCauHoi==$ch->idCauHoi) {
              echo " <tr>
              <td>".$ch->idCauHoi."</td>
              <td>".$ch->NoiDung."</td>
              <td>".$ch->idChuDe."</td>
              <td>".$ch->NgayDuocTao."</td>
              <td><input type='checkbox' name='cauhoidethi[]' value='".$ch->idCauHoi."'</td>
            </tr>";
            break;
            }
          } 
        }
        echo  "</tbody>
      </table>";
      echo "
        
        <div style='width: 100%;text-align: center;'>
          <button type='submit' class='btn btn-danger'>Select Delete</button>
        </div>
      </form>";
    }
    public function getChiTietThongBao($idTB){
     $thongbao=thongbao::where('idThongBao',$idTB)->first();
      
      echo "
      <div class='panel panel-primary'>
      <div class='panel-heading'>Noi Dung</div>
      <div class='panel-body'>".$thongbao->NoiDung."</div>
    </div>
      ";
    }
}
