<?php
	include('ketnoi.php');
	if(isset($_POST['id'])){
		
		$idnew = $_POST['id'];
		$giaspnew = $_POST['giasp'];
		$soluongnew = $_POST['soluong'];
		$diachi = $_POST['diachinhan'];
		$now = getdate(); 
		$ngaydathang = $now["mon"] . "." . $now["mday"] . "." . $now["year"]; 
		$index = 0;
		foreach($idnew as $k => $v){
			$sql = "INSERT INTO oder(gia, ngay_dat_hang, dia_chi_nhan, id_product, soluong) VALUES('$giaspnew[$index]', '$ngaydathang', '$diachi', '$idnew[$index]', '$soluongnew[$index]')";
			echo $sql;
			mysql_query($sql);
			$index ++;
		
		}
		
		header('index.php');
		
		
	}
	else{
		echo 'Khog ton tai';
		exit;
	}
?>