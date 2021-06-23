<?php session_start();?>
<?php $page_title='Book Store';
include('ketnoi.php');
?>
<!DOCTYPE html>
<html>
    <head>
    	
       <link rel="stylesheet" href="./css/style1.css" type="text/css"/>
      <link rel="stylesheet" href="./css/bootstrap.css" type="text/css" />
         <link rel="stylesheet" href="./css/listsanpham.css" type="text/css">
         <meta http-equiv="content-type" content="text/http; charset=UTF-8">
          <script src="jquery.js"></script>
           <script type="text/javascript" src="slider.js"></script>  
           <title><?php echo $page_title; ?></title> 
   </head>
    <body>
        <div id="all">
            <!-- phan top -->
                 
            <div id="top">
                <div id="top-right">
                   
   <?php
   
if (isset($_SESSION['username']))
{
	$ten = $_SESSION['username'];
	$sql = "SELECT * FROM member WHERE username = '$ten'";
	
	$query = mysql_query($sql);
	if(!$query)
	{
		exit();
	}
	$row = mysql_fetch_array($query);
	

	echo 'Xin chào: <i style="color:#00F;"> '.$row['fullname']." &nbsp"; 
	if($row['level'] == 0 || $row['level']==1)
	{
		echo '<a href="admin.php?ID=mMember" style="color: blue;"">Quản lí cửa hàng</a> ';	
	}
	echo '  &nbsp<a href="logout.php">Đăng xuất</a>';
}
// Không tồn tại user name
else 
{
	echo  '<ul>
                <li><img src="images/login.png"></li>
                <li><a href="dangnhap.php">Đăng nhập</a></li>
                <li><a href="dangky.php#dangki">Đăng ký</a></li>
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
								echo'<a href="cart.php" style="color: red;">'; echo (int)$soluong; echo ' sản phẩm </a>';
							?>

                           
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 400px;height: 60px;margin: 30px 0px 0px 0px;">
                  <div id="phone">
                       <div id="ship">
                      
                    </div> 
                    </div>
					
                   
                </div>
            </div>
            </div>
            <!-- phan menu -->
            <?php include('templates/menu_left.php');?>
         
            <!-- phan main -->
            <div id="main">
           		 <!-- phan main_left-->
                <div id="main-left" >
                 <div class="titlebook"> <span> Sách văn học trong nước</span></div>
                 
                 
                 	<?php $tenloai = "Sách văn học trong nước";
					         ?>
               		<?php include('templates/contents.php');?>
                
                  
                    <div class="titlebook"> <span> Sách kinh tế</span></div>
             
       
                  	<?php $tenloai = "Sách kinh tế";
					           ?>
                    <?php include('templates/contents.php');?>
               
                
                    <div class="titlebook"> <span>Tiểu thuyết</span></div>
    
       
                  	<?php $tenloai = "Sách tiểu thuyết";?>
                    <?php include('templates/contents.php');?>
             
              
                    </div>
                  <!--phan main_right-->
                <div id="main-right">
                
               <?php include('templates/main_right.php');?>
                </div>
            
             <!-- phan footer-->
             <a name="dh"></a>
           <div id="footer">             
 <div id="char"><h4 >Book Store</h4>
         <h5 style="font-size:20px">Copyright © Lập trình web </h5>
            </div>
              
</div>
            
        </div>
        
    </body>
</html>

		   