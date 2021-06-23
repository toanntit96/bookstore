<?php
session_start();
include('ketnoi.php');
if(isset($_POST['submit']))
{
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
	@header("location:cart.php");
}
?>
<?php $page_title='Book store';
include('templates/header.inc');
?>
    <body>
        <div id="all">
            <!-- phan top -->
                 
            <div id="top">
                
                <div id="top-right">
                   
   <?php
if (isset($_SESSION['username'])){
echo 'Xin chào: <i style="color:#00F;"> '.$_SESSION['username']." &nbsp"; 
echo '  &nbsp<a href="logout.php">Đăng xuất</a>';
}
else{
echo  '<ul>
                        <li><img src="images/login.png"></li>
                        <li><a href="dangnhap.php">Đăng nhập</a></li>
                        <li><a href="dangky.php">Đăng kí</a></li>
                    </ul>';

}?>
                   
                </div>   
            </div> 
            
            <!-- phan header -->
               
            <div id="header">
                <div style="float: left;width: 250px;height: 54px;margin: 40px 0 0 10px;"><a href="index.php"><img src="images/logo.png" width="250" height="80" alt="logo"></a></div>
                <div style="float: right;width: 400px;height: 93px;">
                    <div id="shopcart">
                        <img src="images/shopcart.png">
                        <div id="info-cart">
            
   						 	<?php
								include('giohang.php');
								if(isset($_GET['xoa'])){
		
									$id = $_GET['xoa'];
									unset($_SESSION['sanpham'][$id]);
									$soluong --;
								}
								echo'<a href="cart.php" style="color: red;">'; echo (int)$soluong; echo ' sản phẩm </a>';
							?>



                           
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 400px;height: 60px; margin: 30px 0px 0px 0px;">
                  <div id="phone">
                       <div id="ship">
                      
                    </div> 
                    </div>
                    
                   
                    
                </div>
            </div>
            </div>
            <!-- phan menu -->
            
            <?php include('templates/menu_left.php');
			?>
            <div id="main">  
            <div id="main_left" style="margin-top:100px;" >         
				<br><br>
				<?php
					if( (int)$soluong != 0){
					
						include('listsanpham.php');
						
					}
					else
					{
						
						echo '<script type="text/javascript">'; 
						echo 'alert("Giỏ hàng trống. Quay lại trang chủ");'; 
						echo 'window.location.href = "index.php";';
						echo '</script>';
					}
				?>
         		

               </div>               
              </div>
             <!-- phan footer-->
             <a name="sp"></a>
           <?php include('templates/footer.inc');?>      