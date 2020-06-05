<table class="table table-bordered">
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
    <tbody>
    	@foreach ($cauhoi as $ch) 
    	<tr>
    		<td>{{$ch->idCauHoi}}</td>
    		<td><?php echo $ch->NoiDung ?></td>
        	<td>{{$ch->idChuDe}}</td>
        	<td>{{$ch->NgayDuocTao}}</td>
        	<td><a href='GiangVien/CauHoi/ChiTietCauHoi/{{$ch->idCauHoi}}'><img class='icon chitiet' idcauhoi='{{$ch->idCauHoi}}' src='images/iconct.jpg'></a></td>
        	<td><a href='GiangVien/CauHoi/SuaCauHoi/{{$ch->idCauHoi}}'><img class='icon chinhsua' idcauhoi='{{$ch->idCauHoi}}' src='images/iconchinhsua.jpg'></a></td>
        	<td><a href='GiangVien/CauHoi/XoaCauHoi/{{$ch->idCauHoi}}'><img class='icon xoa' idcauhoi='{{$ch->idCauHoi}}' src='images/icondel.jpg'></a></td>
    	</tr>
    	@endforeach
    </tbody>
</table>
<div style="width: 100%;text-align: center;">{{$cauhoi->links()}}</div>