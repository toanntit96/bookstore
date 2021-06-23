	<?php
	
				if(isset($_GET['id'])){
					$idsanpham = $_GET['id'];
					if( isset($_SESSION['sanpham'][$idsanpham])){
						
						(int)$count = $_SESSION['sanpham'][$idsanpham];
						$count = $count +1;
						$_SESSION['sanpham'][$idsanpham] = $count;

					}
					else{
						
						$_SESSION['sanpham'][$idsanpham] = 1;
					}
					
					$soluong = count($_SESSION['sanpham']);
				}
				else{
					
					if( isset($_SESSION['sanpham'])){
					
						$soluong = count($_SESSION['sanpham']);
					}
					else{
						
							$soluong = 0;
						
					}
				
				}
	
			
	?>