
$start=(isset($_GET['start'])&&(int)$_GET['start'])? $_GET['start']:0;
	
		
		
$sql="select * from product  Limit $start,$display";
$query1=mysql_query($sql);   

                 


	while($row=mysql_fetch_array($query1))
	{
		 $name = $row['name'];
                        $price = $row['gia'];
                        $id = $row['id_product'];
                       
						$image="images/books/".$row['image']; 
						
					
						echo"
						<ul>
 						<li>
 				
                      <img src='$image'width= 150 height=200>
					<font color='red'></br>";
					echo	" $name:";
				echo number_format($row[gia],3)." VND";
				echo"
				</font>
				</br>	
				<a href='addcart.php?item=$row[id]'>add to cart</a>
			
                           </li>
                     </ul>
					";
		
	
}?>
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