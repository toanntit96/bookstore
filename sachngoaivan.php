<?php session_start();?>
<?php $page_title='Sách ngoại ngữ';
include('templates/header.inc');
$id_theloai = 1;
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
                    $display=20; //Cho 20 dòng hiển thị
                    //tinh tong so trang hien thi
                    if(isset($_POST['page'])&&(int)$_GET['page']) // kiểm tra để $get ko lỗi hoặc chưa xác định
					{
                        $page=$_GET['page'];
						
                     }
					else
					{ //neu chua xac dinh thi tim so trang
                        $connect=mysql_connect("localhost","root","")
						or die("Can not connect database");
						mysql_query("SET NAMES 'utf8'");
						mysql_select_db("bookstore",$connect);
						$sql1="SELECT COUNT(id_product) FROM product";
						$query=mysql_query($sql1);  
                        $row1=mysql_fetch_array($query);
                        $record=$row1[0];
                        if($record>$display)
						{
                            $page=ceil($record/$display); // Làm tròn, xác định số $page
                         }
						else {$page=1;}					// Nếu nhỏ hơn 20 cho =1
                            
                    }
                        $start=(isset($_GET['start'])&&(int)$_GET['start'])? $_GET['start']:0; 
						
                    	$sql="SELECT * FROM product WHERE id_theloai = $id_theloai  Limit $start,$display"; 
						
						//Câu Select ra được số sách thuộc thể loại
						
						?> 
<?php include('templates/products.php');
?>