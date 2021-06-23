<?php session_start();?>
<?php $page_title='Những sách bán chạy nhất';
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
	$ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			}
		}
	}

	if ($ok != 2)
	 {
		echo '<p>0 sản phẩm</p>';
	} else {
		$items = $_SESSION['cart'];
		echo '<p><a href="cart.php">'.count($items).' sản phẩm</a></p>';
	}
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
               
                  <!--phan main_right-->
                 <div id="main-left" style="width:1000px;">
                
             <div id="products">
             <?php 
//xac dinh bao nhieu dong
$display=15;
//tinh tong so trang hien thi
if(isset($_POST['page'])&&(int)$_GET['page']){
	$page=$_GET['page'];
	}else{ //neu chua xac dinh thi tim so trang
	$connect=mysql_connect("localhost","root","")
or die("Can not connect database");
mysql_query("SET NAMES 'utf8'");
mysql_select_db("demo",$connect);
$sql1="SELECT COUNT(id_product) FROM product where thuoc_menu=1.1 ";
$query=mysql_query($sql1);  
	

	$row1=mysql_fetch_array($query);
	$record=$row1[0];
	if($record>$display){
		$page=ceil($record/$display);
		}else {$page=1;}
		
		}
	$start=(isset($_GET['start'])&&(int)$_GET['start'])? $_GET['start']:0;
	
		
		
$sql="select * from product where thuoc_menu=1.1  Limit $start,$display";?>
<?php include('templates/products.php');
?>