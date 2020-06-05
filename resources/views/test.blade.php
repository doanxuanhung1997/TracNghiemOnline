<?php 
foreach($monhoc as $mh){
	echo $mh->TenMonHoc.":<br>";
	$i=0;
	$idmh=$mh->idMonHoc;
	echo "idmon hoc laa :".$idmh;
	foreach($dethi as $dt){
		if($dt->idDeThi===$dsch[$i] && $dt->idMonHoc===$idmh){
			echo $dt->TenDeThi;
			
		}
		
		$i+=1;
		if($i==$dem)
		{
			break;
		}
	}
	echo "<br>";
}
?>