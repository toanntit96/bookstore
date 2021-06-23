<div class="book">
<?php  
$batdau = 0 ;
$soluong = 3;
	$sql="SELECT * FROM product a, theloai b
			WHERE a.id_theloai = b.id_theloai
			AND b.tenloai = '$tenloai'
			ORDER BY id_product ASC LIMIT $batdau,$soluong";

if(!mysql_query($sql)){
	exit;	
} 	
	$query = mysql_query($sql);
	while($row=mysql_fetch_array($query))
	{
						$name = $row['name'];
                        $price = $row['gia'];
                        $id = $row['id_product'];
						$image="./images/books/".$row['image']; 
						
				echo"
				<ul>
 					<li class='ulli'>
 				  		<div class ='content'>";
				  echo ' <a href="details.php?id='; echo $id; echo '#next">';
				  echo "
                      <img src='$image'width= 150 height=200></a>";
				echo"
					<font color='red'></br>";
				echo " $name <br> Giá: ";
				echo $row['gia']." VND";
				echo"
						</font>
						</br>	
						<a href='index.php?id=$row[id_product]#dh'>Thêm vào giỏ</a>
						</div>
                    </li>
                </ul>
					";
		
	}
	
	$batdau = $batdau + $soluong;

	
?>   
</div>