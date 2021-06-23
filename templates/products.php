<?php
$query1=mysql_query($sql);   // Thực thi câu truy vấn từ source;

	while($row=mysql_fetch_array($query1))
	{
						$name = $row['name'];
                        $price = $row['gia'];
                        $id = $row['id_product'];
						$image="./images/books/".$row['image']; 
						
				echo"
				<ul>
 					<li >
 				  		<div class ='content'>
 				  		<div>
 				  			<div>";
				  echo ' <a href="details.php?id='; echo $id; echo '#next">';
				  echo "
                      <img src='$image'width= 150 height=200></a></div>";
				echo"<div>
					<font color='red'></br>";
				echo " $name <br> Giá: ";
				echo $row['gia']." VND";
				echo"
						</font>
						</br>	
						<a href='index.php?id=$row[id_product]#dh'>Thêm vào giỏ</a></div>
						</div>
						</div>
                    </li>
                </ul>
					";
		
	}
?> 

<div id="page">
	
<?php

if($page>1){
	$next=$start+$display; 
	$prev=$start-$display;
	$current=($start/$display)+1;
if($current!=1){
    echo "<li><a href='phantrang.php?start=$prev'> prev</a></li>";
		}
   for($i=1;$i<$page;$i++){
	   if($current!=$i){
	          echo"<li><a href='phantrang.php?start=".($display*($i-1))."'>$i</a></li>";
		}else echo"<li>$i</li>";}
if($current!=$page-1){
				echo"<li><a href='phantrang.php?start=$next'>next</a></li>";
				}
	}
?></div>