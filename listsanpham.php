<script language="javascript">
	function tinhgia(frm){
	
		a = eval(frm.soluong.value);
		b =  eval(frm.giatri.value);
	
		c = a*b;
		if(c <= 0){
			c =0;
			frm.giasp.value = c;
		}
		else{
			frm.giasp.value = c + '.000';
		}
		
		
	};
	function chinhsua(frm){
		window.alert("");
	}
</script>
<?php
	
	

	
	
	
	$connect = mysql_connect("localhost", "root", "") or die(" Cannot conect to database");
	mysql_select_db("bookstore", $connect);
	echo '<form action="muangay.php" method="post" name="form">';
			echo	'<table id="table">';
				echo '<thead style="height: 50px;">';
					echo '<tr style="background-color:#0069A8; text-align:center; color: white;">';
						
						echo '	<td> Tên hàng </td>
									<td> Mô tả </td>
									<td> Số lượng </td>
									<td> <ul><li>Giá tiền</li> <li>Nghìn VND</li></ul></td>
									<td> Tổng tiền </td>
									<td> Hành động </td>
									';
						
					echo '</tr>';
				
				echo '</thead>';
				
				echo '<tbody>';
					
				
					foreach($_SESSION['sanpham'] as $k=>$v){
						
						
						echo '<tr style="background-color:#CCCCCC; ">';
				
							$sql = "SELECT id_product, name, gia, image FROM product WHERE\n". "id_product = $k";
							mysql_query("SET NAMES 'UTF8'");
							$query = mysql_query($sql);
							
							if(!$query){
								
								exit;
								
							}
								
							
							$row = mysql_fetch_array($query);
							$gia = (int)$row['gia'];
							$thanhtien  =  $gia* (int)$v;
							
							
							echo '<td align="center">'; echo $row['name']; echo '</td>';
							echo '<td align="center">'; echo '<img src="images/books/'; echo $row['image']; echo '" style="height: 90px; width: 70px;"></td>';
							echo '<td align="center">'; echo '<input type="number" name="soluong[]" min="0" style="width: 50px;" value="';
								echo $_SESSION['sanpham'][$k]; echo'" onChange="tinhgia(this.form)">'; echo '"</td>';
							echo '<input type = "hidden" name = "id[]" value = "'; echo $row['id_product']; echo '">';	
							echo '<td align="center"><input type = "hidden" name = "giatri"  style="width: 80px;"  value = "'; echo $gia; echo '">'; echo number_format($gia, 3) ; echo '</td>';
							
							echo '<td align="center">'; echo '<input type="text" name="giasp[]" style="width: 80px;" readonly="readonly" value="';
								echo number_format($thanhtien,3); echo '"></td>';
								
							echo '<td align="center">'; echo '<a  href="cart.php?xoa='; echo $row['id_product']; echo '#sp"> <input type="button" value="Xóa"> </a>'; echo '</td>';
							
							
							
						echo '</tr>';
					}
					
				
				echo '</tbody>';
				
				
			echo	'</table>';
			echo '<input type="text" required name="diachinhan[]" placeholder="Địa chỉ nhận hàng" style="height:30px; width="80px"">';
			echo '<input type="submit" name="submit" value="Mua Ngay">';
			echo '</form>';
	 
?>